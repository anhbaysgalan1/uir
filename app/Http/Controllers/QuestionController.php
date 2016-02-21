<?php
/**
 * Created by PhpStorm.
 * User: Станислав
 * Date: 05.04.15
 * Time: 16:15
 */
namespace App\Http\Controllers;
use App\Lecture;
use App\Qtypes\Theorem;
use Auth;
use Cookie;
use Session;
use View;
use App\Result;
use Illuminate\Http\Request;
use App\Question;
use App\Codificator;
use App\Test;
use App\Theme;
use Illuminate\Http\Response;
use App\User;
use App\Qtypes\OneChoice;
use App\Qtypes\MultiChoice;
use App\Qtypes\FillGaps;
use App\Qtypes\AccordanceTable;
use App\Qtypes\YesNo;
use App\Qtypes\Definition;
use App\Qtypes\JustAnswer;

class QuestionController extends Controller{
    private $question;
    function __construct(Question $question){
        $this->question=$question;
    }

    /** По входным данным формы section, theme, type определяет код вопроса a.b.c */
    private function setCode(Request $request){  //Установить код вопроса
        $codificator = new Codificator();
        //получаем необходимые данные из формы
        $section = $request->input('section');
        $theme = $request->input('theme');
        $type = $request->input('type');
        //с помощью кодификаторов составляем трехразрядный код вопроса
        $query1 = $codificator->whereCodificator_type('Раздел')->whereValue($section)->select('code')->first();
        $section_code = $query1->code;
        $query2 = $codificator->whereCodificator_type('Тема')->whereValue($theme)->select('code')->first();
        $theme_code = $query2->code;
        $query3 = $codificator->whereCodificator_type('Тип')->whereValue($type)->select('code')->first();
        $type_code = $query3->code;
        $code = $section_code.'.'.$theme_code.'.'.$type_code;
        return $code;
    }

    /** по id вопроса формирует массив из кодов и названий */
    public function getCode($id){                                                                                       //декодирование вопроса в асс. массив
        $codificator = new Codificator();
        $question = $this->question;
        $query = $question->whereId_question($id)->select('code')->first();
        $code = $query->code;          //получили код вопроса
        $array = explode('.',$code);
        //print_r($array);
        $query1 = $codificator->whereCodificator_type('Раздел')->whereCode($array[0])->select('value')->first();
        $section = $query1->value;
        $query2 = $codificator->whereCodificator_type('Тема')->whereCode($array[1])->join('themes', 'themes.theme', '=', 'codificators.value')->where('themes.section', '=', $section)->select('value')->first();
        $theme = $query2->value;
        $query3 = $codificator->whereCodificator_type('Тип')->whereCode($array[2])->select('value')->first();
        $type = $query3->value;
        $decode = array('section' => $section, 'theme' => $theme, 'type' => $type,
            'section_code' => $array[0], 'theme_code' => $array[1], 'type_code' => $array[2]);
        return $decode;
    }

    /** Определяет одиночный вопрос (true) или может использоваться только в группе с такими же (false) */
    private function getSingle($id){
        $type = $this->getCode($id)['type'];
        if ($type == 'Да/Нет' || $type == 'Определение' || $type == 'Просто ответ'){
            return false;
        }
        else return true;
    }

    /** из массива выбирает случайный элемент и ставит его в конец массива, меняя местами с последним элементом */
    private static function randomArray($array){
        $index = rand(0,count($array)-1);                                                                               //выбираем случайный вопрос
        $chosen = $array[$index];
        $array[$index]=$array[count($array)-1];
        $array[count($array)-1] = $chosen;
        return $array;                                                                                                  //получаем тот же массив, где выбранный элемент стоит на последнем месте для удаления
    }

    /** перемешивает элементы массива */
    public static function mixVariants($variants){
        $num_var = count($variants);
        $new_variants = [];
        for ($i=0; $i<$num_var; $i++){                                                                                  //варианты в случайном порядке
            $variants = QuestionController::randomArray($variants);
            $chosen = array_pop($variants);
            $new_variants[$i] = $chosen;
        }
        return $new_variants;
    }

    /** По номеру теста возвращает список id вопросов, удовлетворяющих всем параметрам теста */
    public function prepareTest($id_test){                                                                             //выборка вопросов
        $test = new Test();
        $test_controller = new TestController($test);
        $question = $this->question;
        $array = [];
        $k = 0;
        $destructured = $test_controller->destruct($id_test);
        for ($i=0; $i<count($destructured); $i++){                                                                      // идем по всем структурам
            $temp_array = [];
            $j = 0;
            $temp = '"';
            $temp .= preg_replace('~\.~', '\.', $destructured[$i][1]);
            $temp = preg_replace('~A~', '[[:digit:]]+', $temp);                                         //заменям все A (All) на регулярное выражение, соответствующее любому набору цифр
            $temp .= '"';
            $query = $question->whereRaw("code REGEXP $temp")->get();                                                  //ищем всевозможные коды вопросов
            $test_query = Test::whereId_test($id_test)->select('test_type')->first();
            foreach ($query as $id){
                if ($this->getCode($id->id_question)['section_code'] != 'T'){                                                  //если вопрос не временный
                    if ($test_query->test_type == 'Тренировочный'){                                                     //если тест тренировочный
                        if ($id->control == 1)                                                                          //если вопрос скрытый, то проходим мимо
                            continue;
                        array_push($temp_array,$id->id_question);                                                       //для каждого кода создаем массив всех вопрососв с этим кодом
                    }
                    else array_push($temp_array,$id->id_question);                                                      // если тест контрольный
                }
            }
            while ($j < $destructured[$i][0]){                                                                          //пока не закончатся вопросы этой структуры
                $temp_array = $this->randomArray($temp_array);                                                          //выбираем случайный вопрос
                $temp_question = $temp_array[count($temp_array)-1];
                if ($this->getSingle($temp_question)){                                                                  //если вопрос одиночный (то есть как и было ранее)
                    $array[$k] = $temp_question;                                                                        //добавляем вопрос в выходной массив
                    $k++;
                    $j++;
                    array_pop($temp_array);
                }
                else {                                                                                                  //если вопрос может использоваться только в группе
                    $query = $question->whereId_question($temp_question)->first();
                    $base_question_type = $this->getCode($temp_question)['type_code'];                                  //получаем код типа базового вопроса, для которого будем создавать группу
                    $max_id = Question::max('id_question');
                    $new_id = $max_id+1;
                    $new_title = $query->title;                                                                         //берем данные текущего вопроса
                    $new_answer = $query->answer;
                    array_pop($temp_array);                                                                             //и убираем его из массива
                    $new_temp_array = [];
                    for ($p=0; $p < count($temp_array); $p++){                                                          //создаем копию массива подходящих вопросов
                        $new_temp_array[$p] = $temp_array[$p];
                    }
                    $l = 0;
                    while ($l < 3) {                                                                                    //берем еще 3 вопроса этого типа => в итоге получаем 4
                        $new_temp_array = $this->randomArray($new_temp_array);
                        $temp_question_new = $new_temp_array[count($new_temp_array)-1];

                        if ($this->getCode($temp_question_new)['type_code'] != $base_question_type){                    //если тип вопроса не совпадает с базовым
                            array_pop($new_temp_array);                                                                 //удаляем его из новго массива и идем дальше
                            continue;
                        }

                        $index_in_old_array = array_search($temp_question_new, $temp_array);                            //ищем в базовом массиве индекс нашего вопроса
                        $chosen = $temp_array[$index_in_old_array];                                                     //и меняем его с последним элементом в этом массиве
                        $temp_array[$index_in_old_array]=$temp_array[count($temp_array)-1];
                        $temp_array[count($temp_array)-1] = $chosen;

                        $query_new = $question->whereId_question($temp_question_new)->first();
                        $new_title .= ';'.$query_new->title;                                                            //составляем составной вопрос
                        $new_answer .= ';'.$query_new->answer;
                        array_pop($temp_array);                                                                         //удаляем и из базовгго массива
                        array_pop($new_temp_array);                                                                     //и из нового
                        $l++;
                        }
                    Question::insert(array('control' => 0, 'code' => 'T.T.'.$base_question_type, 'title' => $new_title, 'variants' => '', 'answer' => $new_answer, 'points' => 1));    //вопрос про код и баллы
                    $array[$k] = $new_id;                                                                               //добавляем сформированный вопрос в выходной массив
                    $k++;
                    $j++;
                }
            }
        }
        return $array;                                                                                                  //формируем массив из id вошедших в тест вопросов
    }

    /** Из выбранного массива вопросов теста выбирает один */
    public function chooseQuestion(&$array){
        if (empty($array)){                                                                                             //если вопросы кончились, завершаем тест
            return -1;
        }
        else{
            $array = $this->randomArray($array);
            $choisen = $array[count($array)-1];
            array_pop($array);                                                                                          //удаляем его из списка
            return $choisen;
        }
    }

    /** Показывает вопрос согласно типу */
    private function showTest($id_question, $count){
        $decode = $this->getCode($id_question);
        $type = $decode['type'];
        switch($type){
            case 'Выбор одного из списка':
                $one_choice = new OneChoice($id_question);
                $array = $one_choice->show($count);
                return $array;
                break;
            case 'Выбор нескольких из списка':
                $multi_choice = new MultiChoice($id_question);
                $array = $multi_choice->show($count);
                return $array;
                break;
            case 'Текстовый вопрос':
                $fill_gaps = new FillGaps($id_question);
                $array = $fill_gaps->show($count);
                return $array;
                break;
            case 'Таблица соответствий':
                $accordance_table = new AccordanceTable($id_question);
                $array = $accordance_table->show($count);
                return $array;
                break;
            case 'Да/Нет':
                $yes_no = new YesNo($id_question);
                $array = $yes_no->show($count);
                return $array;
                break;
            case 'Определение':
                $def = new Definition($id_question);
                $array = $def->show($count);
                return $array;
                break;
            case 'Просто ответ':
                $just = new JustAnswer($id_question);
                $array = $just->show($count);
                return $array;
                break;
            case 'Теорема':
                $theorem = new Theorem($id_question);
                $array = $theorem->show($count);
                return $array;
                break;
        }
    }

    /** Проверяет вопрос согласно типу и на выходе дает баллы за него */
    private function check($array){
        $question = $this->question;
        $id = $array[0];
        $query = $question->whereId_question($id)->select('answer','points')->first();
        $points = $query->points;
        $type = $this->getCode($id)['type'];
        if (count($array)==1){                                                                                          //если не был отмечен ни один вариант
            $choice = [];
            $score = 0;
            $data = array('mark'=>'Неверно','score'=> $score, 'id' => $id, 'points' => $points, 'choice' => $choice, 'right_percent' => 0);
            return $data;
        }
        for ($i=0; $i < count($array)-1; $i++){                                                                         //передвигаем массив, чтобы первый элемент оказался последним
            $array[$i] = $array[$i+1];
        }
        array_pop($array);                                                                                              //убираем из входного массива id вопроса, чтобы остались лишь выбранные варианты ответа
        switch($type){
            case 'Выбор одного из списка':
                $one_choice = new OneChoice($id);
                $data = $one_choice->check($array);
                return $data;
                break;
            case 'Выбор нескольких из списка':
                $multi_choice = new MultiChoice($id);
                $data = $multi_choice->check($array);
                return $data;
                break;
            case 'Текстовый вопрос':
                $fill_gaps = new FillGaps($id);
                $data = $fill_gaps->check($array);
                return $data;
                break;
            case 'Таблица соответствий':
                $accordance_table = new AccordanceTable($id);
                $data = $accordance_table->check($array);
                return $data;
                break;
            case 'Да/Нет':
                $yes_no = new YesNo($id);
                $data = $yes_no->check($array);
                return $data;
                break;
            case 'Вопрос на вычисление':
                echo 'Вопрос на вычисление';
                break;
            case 'Вопрос на соответствие':
                echo 'Вопрос на соответствие';
                break;
            case 'Вид функции':
                echo 'Вопрос на определение аналитического вида функции';
                break;
        }
    }

    /** вычисляет оценку по Болонской системе, если дан максимально возможный балл и реальный */
    private function calcMarkBologna($max, $real){
        if ($real < $max * 0.6){
            return 'F';
        }
        if ($real >= $max * 0.6 && $real < $max * 0.65){
            return 'E';
        }
        if ($real >= 0.65 && $real < $max * 0.75){
            return 'D';
        }
        if ($real >= 0.75 && $real < $max * 0.85){
            return 'C';
        }
        if ($real >= 0.85 && $real < $max * 0.9){
            return 'B';
        }
        if ($real >= 0.9){
            return 'A';
        }
    }

    /** вычисляет оценку по обычной 5-тибалльной шкале, если дан максимально возможный балл и реальный */
    private function calcMarkRus($max, $real){
        if ($real < $max * 0.6){
            return '2';
        }
        if ($real >= $max * 0.6 && $real < $max * 0.7){
            return '3';
        }
        if ($real >= 0.7 && $real < $max * 0.9){
            return '4';
        }
        if ($real >= 0.9){
            return '5';
        }
    }

    /** По id вопроса возвращает массив, где первый элемент - номер лекции, второй - <раздел.тема> */
    private function linkToLecture($id_question){
        $array = [];
        $theme = $this->getCode($id_question)['theme'];
        $query_theme = Theme::whereTheme($theme)
                        ->join('codificators', 'themes.theme', '=', 'codificators.value')
                        ->where('codificators.codificator_type', '=', 'Тема')
                        ->first();
        $lecture_id = $query_theme->lecture_id;
        $query_lec = Lecture::whereId_lecture($lecture_id)->first();
        $lection_number = $query_lec->lecture_number;
        array_push($array, $lection_number);
        array_push($array, '#'.$this->getCode($id_question)['section_code'].'.'.$this->getCode($id_question)['theme_code']);
        return $array;
    }

    /** главная страница модуля тестирования */
    public function index(){
        $username =  null;
        Session::forget('test');
        if (Auth::check()){
            $username = Auth::user()['first_name'];
        }
        return view('questions.teacher.index', compact('username'));
    }

    /** переход на страницу формы добавления */
    public function create(){
        $codificator = new Codificator();
        $types = [];
        $query = $codificator->whereCodificator_type('Тип')->select('value')->get();
        foreach ($query as $type){
            array_push($types,$type->value);
        }
        return view('questions.teacher.create', compact('types'));
    }

    /** AJAX-метод: подгружает интерфейс создания нового вопроса в зависимости от выбранного типа вопроса */
    public function getType(Request $request){
        if ($request->ajax()){
            $type = $request->input('choice');
            $query = $this->question->max('id_question');
            $id = $query + 1;
            switch($type){
                case 'Выбор одного из списка':                      //Стас
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create1', compact('sections'));
                    break;
                case 'Выбор нескольких из списка':
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create2', compact('sections'));
                    break;
                case 'Текстовый вопрос':                            //Стас
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create3', compact('sections'));
                    break;
                case 'Таблица соответствий':                        //Миша
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create5', compact('sections'));
                    break;
                case 'Да/Нет':                                      //Миша
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create4', compact('sections'));
                    break;
                case 'Определение':
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create7', compact('sections'));
                    break;
                case 'Просто ответ':
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create8', compact('sections'));
                    break;
                case 'Теорема':
                    $codificator = new Codificator();
                    $sections = [];
                    $query = $codificator->whereCodificator_type('Раздел')->select('value')->get();
                    foreach ($query as $section){
                        array_push($sections,$section->value);
                    }
                    return (String) view('questions.teacher.create6', compact('sections'));
                    break;
            }
        }
    }

    /** Обработка формы добавления вопроса */
    public function add(Request $request){
        $code = $this->setCode($request);
        $type = $request->input('type');
        $query = Question::max('id_question');                                                                          //пример использования агрегатных функций!!!
        $id = $query+1;
        switch($type){
            case 'Выбор одного из списка':
                $one_choice = new OneChoice($id);
                $one_choice->add($request, $code);
                break;
            case 'Выбор нескольких из списка':
                $multi_choice = new MultiChoice($id);
                $multi_choice->add($request, $code);
                break;
            case 'Текстовый вопрос':
                $fill_gaps = new FillGaps($id);
                $fill_gaps->add($request, $code);
                break;
            case 'Таблица соответствий':
                $fill_gaps = new AccordanceTable($id);
                $fill_gaps->add($request, $code);
                break;
            case 'Да/Нет':
                $fill_gaps = new YesNo($id);
                $fill_gaps->add($request, $code);
                break;
            case 'Определение':
                $definition = new Definition($id);
                $definition->add($request, $code);
                break;
            case 'Просто ответ':
                $just = new JustAnswer($id);
                $just->add($request, $code);
                break;
            case 'Теорема':
                $theorem = new Theorem($id);
                $theorem->add($request, $code);
                break;
        }
        return redirect()->route('question_create');
    }

    /** AJAX-метод: Формирует список тем, соответствующих выбранному разделу */
    public function getTheme(Request $request){
        if ($request->ajax()) {
            $themes = new Theme();
            $themes_list = [];
            $query = $themes->whereSection($request->input('choice'))->select('theme')->get();
            foreach ($query as $str){
                array_push($themes_list,$str->theme);
            }
            return (String) view('questions.student.getTheme', compact('themes_list'));
        }
    }

    /** Главный метод: гененрирует полотно вопросов на странице тестов */
    public function showViews($id_test){
        $test = new Test();
        $result = new Result();
        $user = new User();
        $widgets = [];
        $saved_test = [];
        $current_date = date('U');

        $query = $test->whereId_test($id_test)->select('amount', 'test_name', 'test_time', 'start', 'end', 'test_type')->first();
        if ($current_date < strtotime($query->start) || $current_date > strtotime($query->end)){                          //проверка открыт ли тест
            return view('no_access');
        }
        $amount = $query->amount;                                                                                       //кол-во вопрососв в тесте
        $result->test_name = $query->test_name;
        $test_time = $query->test_time;
        $test_type = $query->test_type;

        if (!Session::has('test')){                                                                                     //если в тест зайдено первый раз
            $test = new Test();
            $test_controller = new TestController($test);
            $ser_array = $this->prepareTest($id_test);
            for ($i=0; $i<$amount; $i++){
                $id = $this->chooseQuestion($ser_array);
                if (!$test_controller->rybaTest($id)){                                                                  //проверка на вопрос по рыбе
                    return view('no_access');
                };
                $data = $this->showTest($id, $i+1);                                                                     //должны получать название view и необходимые параметры
                $saved_test[] = $data;
                $widgets[] = View::make($data['view'], $data['arguments']);
            }

            $start_time = date_create();                                                                                //время начала
            $int_end_time =  date_format($start_time,'U')+60*$test_time;                                                //время конца
            Session::put('end_time',$int_end_time);
            $query = Result::max('id_result');                                                                          //пример использования агрегатных функций!!!
            $current_result = $query+1;                                                                                 //создаем строку в таблице пройденных тестов
            $query2 = $user->whereEmail(Auth::user()['email'])->select('id')->first();
            $result->id_result = $current_result;
            $result->id_user = $query2->id;;
            $result->id_test = $id_test;
            $result->amount = $amount;
            $result->save();
            $saved_test = serialize($saved_test);
            Result::where('id_result', '=', $current_result)->update(['saved_test' => $saved_test]);
            Session::put('test', $current_result);
        }
        else {                                                                                                          //если была перезагружена страница теста или тест был покинут
            $current_test = Session::get('test');
            $query = $result->whereId_result($current_test)->first();
            $int_end_time = Session::get('end_time');                                                                   //время окончания теста
            $saved_test = $query->saved_test;
            $saved_test = unserialize($saved_test);
            for ($i=0; $i<$amount; $i++){
                $widgets[] = View::make($saved_test[$i]['view'], $saved_test[$i]['arguments']);
            }
        }

        $current_time = date_create();                                                                                  //текущее время
        $int_left_time = $int_end_time - date_format($current_time, 'U');                                               //оставшееся время
        $left_min =  floor($int_left_time/60);                                                                          //осталось минут
        $left_sec = $int_left_time % 60;                                                                                //осталось секунд

        $widgetListView = View::make('questions.student.widget_list',compact('amount', 'id_test','left_min', 'left_sec', 'test_type'))->with('widgets', $widgets);
        $response = new Response($widgetListView);
        return $response;
    }

    /** Проверка теста */
    public function checkTest(Request $request){   //обработать ответ на вопрос
        if (Session::has('test'))                                                                                       //проверяем повторность обращения к результам
            $current_test = Session::get('test');                                                                       //определяем проверяемый тест
        else
            return redirect('tests');
        Session::forget('test');                                                                                        //тест считается честно пройденым
        Session::forget('end_time');
        $amount = $request->input('amount');
        $id_test = $request->input('id_test');
        $test = new Test();
        $score_sum = 0;                                                                                                 //сумма набранных баллов
        $points_sum = 0;                                                                                                //сумма максимально овзможных баллов
        $choice = [];                                                                                                   //запоминаем выбранные варианты пользователя
        $right_percent = [];                                                                                            //Процент правильности ответа на неверный вопрос
        $j = 1;

        $query = $test->whereId_test($id_test)->select('total', 'test_name', 'amount', 'test_type')->first();
        $total = $query->total;
        $test_type = $query->test_type;
        for ($i=0; $i<$amount; $i++){                                                                                   //обрабатываем каждый вопрос
            $data = $request->input($i);
            $array = json_decode($data);
            $link_to_lecture[$j] = $this->linkToLecture($array[0]);
            //print_r($array);
            $data = $this->check($array);
            $right_or_wrong[$j] = $data['mark'];
            $choice[$j] = $data['choice'];
            $right_percent[$j] = $data['right_percent'];
            $j++;
            $score_sum += $data['score'];                                                                               //сумма набранных баллов
            $points_sum += $data['points'];                                                                             //сумма максимально возможных баллов
        }
        if ($points_sum != 0){
            $score = $total*$score_sum/$points_sum;
            $score = round($score,1);
        }
        else $score = $total;

        $mark_bologna = $this->calcMarkBologna($total, $score);                                                         //оценки
        $mark_rus = $this->calcMarkRus($total, $score);

        $result = new Result();
        $date = date('Y-m-d H:i:s', time());                                                                            //текущее время
        if ($test_type != 'Тренировочный'){                                                                             //если тест контрольный
            $result->whereId_result($current_test)->update(['result_date' => $date, 'result' => $score, 'mark_ru' => $mark_rus, 'mark_eu' => $mark_bologna]);
            return view('tests.ctrresults', compact('score', 'mark_bologna', 'mark_rus'));
        }
        else{                                                                                                           //если тест тренировочный
            $amount = $query->amount;

            $widgets = [];
            $query = $result->whereId_result($current_test)->first();                                                   //берем сохраненный тест из БД
            $saved_test = $query->saved_test;
            $saved_test = unserialize($saved_test);

            for ($i=0; $i<$amount; $i++){
                $widgets[] = View::make($saved_test[$i]['view'].'T', $saved_test[$i]['arguments'])->with('choice', $choice[$i+1]);
            }
            $result->whereId_result($current_test)->update(['result_date' => $date, 'result' => $score, 'mark_ru' => $mark_rus, 'mark_eu' => $mark_bologna]);
            $widgetListView = View::make('questions.student.training_test',compact('score','right_or_wrong', 'mark_bologna', 'mark_rus', 'right_percent', 'link_to_lecture'))->with('widgets', $widgets);
            return $widgetListView;
        }
    }
}