@extends('templates.base')
@section('head')
    <title>Лекция 8</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    {!! HTML::style('css/bootstrap.css') !!}
    {!! HTML::style('css/materialadmin.css') !!}
    {!! HTML::style('css/font-awesome.min.css') !!}
    {!! HTML::style('css/material-design-iconic-font.min.css') !!}
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!! HTML::script('js/libs/utils/html5shiv.js') !!}
    {!! HTML::script('js/libs/utils/respond.min.js') !!}
    <![endif]-->


@stop
@section('content')


    <!-- BEGIN BLANK SECTION -->
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li>{!! HTML::linkRoute('home', 'Главная') !!}</li>
                <li>{!! HTML::linkRoute('library_index', 'Библиотека') !!}</li>
                <li class="active">Лекция 8.</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
        </div><!--end .section-body -->
    </section>
    <div class="card card-tiles style-default-light" style="margin-left:2%; margin-right:2%">
        <article class="style-default-bright">
            <div class="card-body">
                <article style="margin-left:10%; margin-right:10%; text-align: justify">

                    <a name="2.5"></a>

<p><strong>&sect; 8.1.</strong> <strong>Несчетность множества действительных чисел (континуума)</strong></p>

<p>Множество действительных чисел обозначим латинской буквой R.</p>

<p><strong><u>Т.8.1. (1) Теорема</u></strong></p>

<p><strong>Множество действительных чисел несчётно.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p>Предположим противное, пусть множество действительных чисел счетное. Тогда любое подмножество счетного множества тоже счетное. Возьмём на множестве действительных чисел подмножество R<sub>1</sub> - интервал (0,1) и выкинем из этого отрезка числа, содержащие хотя бы в одном своём разряде нули или девятки (примеры таких чисел: 0.9, 0.0001 и т.д.). Множество R<sub>2</sub>, составленное из оставшихся чисел, является подмножеством множества R<sub>1</sub> . Это означает, что R<sub>2 </sub>&ndash; счетное.&nbsp;</p>

<p>Из того факта, что R<sub>2 </sub>&ndash; счетное, напрямую следует, что возможен какой-либо способ перечисления его элементов для установления взаимно-однозначного соответствия между&nbsp; элементами R<sub>2 </sub>и элементами множества натуральных чисел. Это следует из самого определения мощности множества, согласно которому предполагается, что в равномощных множествах каждый элемент одного множества имеет парный элемент из другого множества и наоборот.&nbsp; Обратите внимание, фундаментальное отличие данного определения от определения эффективной перечислимости состоит в том, что в данном случае мы даже не говорим о наличии какого-либо алгоритма перечисления, мы просто утверждаем, что можно привести список действительных чисел из множества R<sub>2 </sub>и список соответствующих им натуральных чисел из множества N. Алгоритм построения связи N &harr; R<sub>2&nbsp; </sub>нас в данном случае не интересует, достаточно того, что такое соответствие возможно.</p>

<p>Построим такой список чисел из множества R<sub>2&nbsp; </sub>и пронумеруем числа в разрядах:</p>

<p>0.a<sub>11</sub>a<sub>12</sub>a<sub>13</sub>&hellip;</p>

<p>0.a<sub>21</sub>a<sub>22</sub>a<sub>23</sub>&hellip;</p>

<p>&hellip;&hellip;&hellip;&hellip;&hellip;</p>

<p>0.a<sub>n1</sub>a<sub>n2</sub>a<sub>n3</sub>&hellip;</p>

<p>Теперь построим число b=0.b<sub>1</sub>b<sub>2</sub>&hellip;, причём</p>

<p>b<sub>i</sub>=a<sub>ii</sub>+1, где + обозначает операцию сложения, результатом которого не могут быть числа 0 и 9, т.е.&nbsp; если a<sub>ii</sub>=1, то b<sub>i</sub>=2; если а<sub>ii</sub>=2,&nbsp; то b<sub>i</sub>=3, &hellip;., если a<sub>ii</sub>=8, то b<sub>i</sub>=1).</p>

<p>Таким образом, построенное число b будет отличаться от каждого из чисел множества R<sub>2</sub> хотя бы в одном разряде, и, следовательно, не попадёт в составленный список. Однако по своей структуре число b должно содержаться в множестве R<sub>2</sub>. Получили противоречие, значит исходное предположение неверно и множество R<sub>2</sub>&nbsp; - несчётно.</p>

<p>Так как множество R<sub>2 </sub>является по условию подмножеством множества R<sub>1</sub>, то &nbsp;R<sub>1</sub> &ndash; несчетно, а т.к. R<sub>1</sub> несчетно &ndash; то значит и множество R несчётно,<strong> Q.E.D.</strong></p>

<p><strong>Примечание</strong>: можно и не выбрасывать числа, содержащие 0 и 9. Таким образом, в наш ряд некоторые числа войдут дважды. Это связано с тем, что конечные дроби могут быть превращены в бесконечные. Например &nbsp;&frac12;=0,5=0,5(0)=0,4(9).</p>

<p>В общем случае это могло стать причиной того, что не удалось сосчитать множество действительных чисел. Но множество чисел, представимых двояким образом (конечные дроби) &ndash; это множество рациональных чисел. Как было доказано ранее, их счетное количество. Можно даже показать, что это множество эффективно перечислимо. Т.о. даже двойное представление множества таких чисел образует счетное множество, следовательно, доказательство верно даже без такого упрощения.</p>

<p>Получен принципиально новый результат &ndash; найдено несчетное множество чисел. Его мощность согласно доказанной теореме не равна алеф-нуль (&alefsym;<sub>0</sub>) , а значит необходимо новое число в трансфинитной шкале.</p>

<p>&nbsp;</p>

<p><strong><em><u>Алеф (</u></em></strong><strong><em><u>&alefsym;) </u></em></strong><strong><em><u>&ndash; второе трансфинитное число.</u></em></strong> По определению это мощность континуума (всех действительных чисел).&nbsp; Это вторая по величине бесконечная мощность. Доказанная только что Теорема &nbsp;2.4.(1) о несчетности множества действительных чисел является убедительным доказательством того, что мощность этого множества больше, чем алеф-ноль (больше множества натуральных чисел). И это весьма важный результат после череды доказательства счетности разнообразных множеств чисел.</p>

<p>Если оперировать понятием кардинального числа (мощности), то получим, что, так как каждое число сегмента (0,1) может быть представлено десятичной дробью вида 0.a<sub>1</sub>a<sub>2</sub>a<sub>3</sub>&hellip; не менее одного раза и не более двух, то:</p>

<p>&alefsym;&le;10 <sup>&alefsym;0</sup>&le; 2&alefsym; ,</p>

<p>а т.к. 2&alefsym;=&alefsym;, то получим что 10 <sup>&alefsym;0</sup>= &alefsym;. Те же рассуждения справедливы в случае, если мы будем разлагать числа не в десятичные, а, например, в двоичные дроби, дроби с основанием 3, 15, 10005 или даже &alefsym;<sub>0</sub> &nbsp;(если вы можете такое себе представить).</p>

<p>Т.о. &alefsym; =2<sup>&alefsym;0</sup>=3<sup>&alefsym;0</sup>=&hellip;=10<sup>&alefsym;0</sup>=&hellip;n<sup>&alefsym;0</sup>=&hellip;&alefsym;<sub>0</sub><sup>&alefsym;0</sup></p>

<p>Если задуматься, можно обнаружить&nbsp; очередной не вполне очевидный факт из теории множеств. &alefsym;<sup>2</sup>=&alefsym;&bull;&alefsym; есть мощность множества пар действительных чисел. Пара действительных чисел, вообще говоря, соответствует точке на плоскости. В свою очередь, &nbsp;&alefsym;<sup>3</sup>=&alefsym;&bull;&alefsym;&bull;&alefsym;&nbsp; есть мощность множества троек действительных чисел, а это точки в пространстве. Рассуждения можно продолжить далее вплоть до &alefsym;<sub>0</sub> - мерного пространства или множества всех последовательностей действительных чисел счетной длины. Т.о. все конечно-мерные или счетно-мерные&nbsp; пространства имеют одинаковую мощность &alefsym; (здесь &alefsym; - количество точек в пространстве).</p>

<p>Для &alefsym;<sub>0</sub>- мерного действительного пространства или множества всех последовательностей действительных чисел счетной длины с точки зрения операций над кардинальными числами получим &alefsym;<sup>&alefsym;0</sup>=(2<sup>&alefsym;0</sup>)<sup>&alefsym;0</sup>=2<sup>&alefsym;0</sup><sup>∙</sup><sup>&alefsym;0</sup>=2<sup>&alefsym;0</sup>=&alefsym;.</p>

<p>В этом месте интересно будет обратиться к историческим событиям, связанным с чередой доказательств в этой сфере. С тем, что на бесконечной прямой столько же точек, сколько и на отрезке, математики, хотя и не сразу, но в итоге примирились. Но следующий результат Кантора оказался еще более неожиданным. В поисках множества, имеющего больше элементов, чем отрезок на действительной оси, он обратил внимание на множество точек квадрата. Изначально сомнений в результате не было: ведь отрезок целиком размещается на одной стороне квадрата, а множество всех отрезков, на которые можно разложить квадрат, само по себе имеет ту же мощность, что и множество точек отрезка. На протяжении почти трех лет (с 1871 по 1874) Кантор искал доказательство того, что взаимно однозначное соответствие между точками отрезка и точками квадрата невозможно. И в какой то момент совершенно неожиданно получился прямо противоположный результат: ему удалось построить соответствие, которое он искренне считал невозможным. Кантор не верил сам себе и даже написал немецкому математику Рихарду Дедекинду: &laquo;Я вижу это, но не верю этому&raquo;. Когда шок от этого факта прошел, стало интуитивно понятно и вскоре доказано, что и куб имеет столько же точек, сколько отрезок. Вообще говоря, любая геометрическая фигура на плоскости (геометрическое тело в пространстве), содержащая хотя бы одну линию, имеет столько же точек, сколько отрезок. Такие множества назвали множествами мощности континуума (от латинского continuum &ndash; непрерывный). Следующий шаг почти очевиден: размерность пространства в определенных пределах несущественна. Например,&nbsp; 2-х мерная плоскость, 3-х мерное привычное пространство, 4-х, 5-ти и далее n-мерные пространства с точки зрения количества точек, содержащихся в соответствующем n-мерном теле, равномощны. Такая ситуация будет наблюдаться даже в случае пространства с бесконечным количеством измерений, важно только чтобы это количество было счетным.</p>

<p>На данном этапе обнаружены два типа бесконечностей и соответственно два трансфинитных числа, обозначающих их мощности. Множества первого типа имеют мощность, эквивалентную мощности натуральных чисел (алеф-ноль). Множества второго типа имеют мощность, эквивалентную количеству точек на действительной оси (мощность континуума, алеф). Показано, что во множествах второго типа элементов больше, чем во множествах первого типа. Естественно, возникает вопрос &ndash; а нет ли в природе &laquo;промежуточного&raquo; множества, которое имело бы мощность больше чем количество натуральных чисел, но при этом меньше, чем множество точек на прямой? Этот непростой вопрос получил название <strong><em>&laquo;проблема континуума&raquo;</em></strong>. Она же известна как <strong><em>&laquo;континуум-гипотеза&raquo;</em></strong> или &laquo;<em>первая проблема Гильберта&raquo;</em>. Точная формулировка звучит следующим образом:</p>

<p style="margin-left:36.0pt"><strong><em>Континуум-гипотеза</em></strong><em>: любое бесконечное подмножество континуума является либо счетным, либо континуальным. </em></p>

<p style="margin-left:36.0pt">Иная версия:</p>

<p style="margin-left:36.0pt"><strong><em><a name="80">Континуум-гипотеза</a></em></strong><em>: с точностью до эквивалентности, существуют только два типа бесконечных числовых множеств: счетное множество и континуум</em></p>

<p style="margin-left:36.0pt">&nbsp;</p>

<p>Иначе говоря, гипотеза предполагает, что не существует множества <em>промежуточной мощности</em>, т. е. такого множества X,{!! HTML::image('img/library/Pic/8.1.JPG', 'a picture', array('style' => 'height:18px; width:55px')) !!}, которое не эквивалентно ни                     {!! HTML::image('img/library/Pic/8.2.jpg', 'a picture', array('style' => 'height:13px; width:11px')) !!}, ни {!! HTML::image('img/library/Pic/8.3.jpg', 'a picture', array('style' => 'height:15px; width:13px')) !!}</em>. Этой проблемой занимались очень многие математики. Сам Георг Кантор неоднократно заявлял, что доказал эту гипотезу, но всякий раз находил у себя ошибку.</p>

<p>Название &laquo;<em>первая проблема Гильберта&raquo;</em> относится к публикации Давидом Гильбертом на II&nbsp;Международном Конгрессе математиков в Париже в 1901 году списка из 23 кардинальных проблем математики. Тогда эти проблемы не были решены, позднее окончательное решение получили 16 проблем из 23.</p>

<p>В результате после долгих исследований по вопросу континуум-гипотезы в 1938 году немецкий математик Курт Гедёль доказал, что существование промежуточной мощности не противоречит остальным аксиомам теории множеств. И позднее, в 1963-1964 гг. почти одновременно, но независимо друг от друга, американский математик Коэн и чешский математик Вопенка показали, что наличие такой промежуточной мощности не выводимо из остальных аксиом теории множеств. Кстати, интересно заметить, что этот результат очень похож на историю с постулатом о параллельных прямых. Как известно, две тысячи лет его пытались вывести из остальных аксиом геометрии, но только после работ Лобачевского, Гильберта и других удалось получить тот же результат: этот постулат не противоречит остальным аксиомам, но и не может быть выведен из них.</p>

<p><strong>&sect; 8.2.</strong> <strong>Множества комплексных, трансцендентных и иррациональных чисел</strong></p>

<p>Приведем в дополнение к множеству действительных чисел еще несколько несчетных множеств.</p>

<p style="margin-left:36.0pt"><strong><em><a name="81">Комплексное</a></em></strong><em> число задается парой (</em><em>r</em><em><sub>1</sub></em><em>, </em><em>r</em><em><sub>2</sub></em><em>), где </em><em>r</em><em><sub>1</sub></em><em>, </em><em>r</em><em><sub>2 </sub></em><em>принадлежат множеству&nbsp; действительных чисел.</em></p>

<p>Множество комплексных чисел обозначим латинской буквой С.</p>

<p><strong><u>Т.8.2.(1) Теорема</u></strong></p>

<p><strong>Множество комплексных чисел несчетно.</strong></p>

<p style="margin-left:63.0pt"><strong style="line-height:1.6em"><u>Доказательство</u></strong></p>

<p>&nbsp;Так как множество действительных чисел R, несчётное по доказанной ранее Теореме 2.4.(1), является подмножеством множества комплексных чисел С, то множество комплексных чисел&nbsp; также несчётно, <strong>Q.E.D.</strong></p>

<p style="margin-left:36.0pt"><strong><em><a name="82">Иррациональным</a></em></strong><em> называется действительное число, не являющееся рациональным.</em></p>

<p>Множество иррациональных чисел обозначим латинской буквой I.</p>

<p><strong><u>Т.8.2.(2) Теорема</u></strong></p>

<p><strong>Множество иррациональных чисел несчетно.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p>Поскольку действительных чисел &ndash; несчетное множество, а рациональных &ndash; счетное, то иррациональных чисел &ndash; несчетное множество, <strong>Q.E.D.</strong></p>

<p><strong><em><a name="83">Трансцендентное число </a>- </em></strong><em>действительное число, не являющееся алгебраическим. </em></p>

<p>Множество трансцендентных чисел обозначим латинской буквой Т. Каждое трансцендентное действительное число&nbsp; является иррациональным, но обратное неверно. Например, число &radic;2 иррациональное, но не трансцендентное: оно является корнем уравнения <em>x</em><sup>2</sup> &minus; 2=0.</p>

<p><strong><u>Т.8.2. (3) Теорема </u></strong></p>

<p><strong>Множество трансцендентных чисел несчетно.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p>Поскольку действительных чисел &ndash; несчетное множество, а алгебраических &ndash; счетное, и при этом множество A является подмножеством R, то R \ А (множество трансцендентных чисел) представляет собой несчетное множество, <strong>Q.E.D.</strong></p>

<p>Это несложное доказательство существования трансцендентных чисел опубликовано Кантором в 1873 году и произвело большое впечатление на научную общественность, так как доказывало существование множества чисел, не строя ни одного конкретного примера, а лишь исходя из общих соображений. Из этого доказательства нельзя извлечь ни одного конкретного примера трансцендентного числа, про доказательство такого типа говорят, что оно <strong><em>неконструктивно</em></strong>.</p>

<h3>&sect; 8.3. Вычислимые числа</h3>

<p style="margin-left:36.0pt"><em>Действительное число <strong>вычислимо</strong>, если существует алгоритм его вычисления с любой степенью точности.</em></p>

<p>Например, все рациональные числа вычислимы, так как существует алгоритм их вычисления до любого знака, то есть с любой степенью точности.</p>

<p>Алгебраические числа являются вычислимыми, так как существуют численные методы их вычисления (алгоритм Ньютона), позволяющие их вычислить с любой степенью точности.</p>

<p>Важно отметить, что все рациональные числа суть алгебраические, т.к. они могут быть представлены как корни уравнения a<sub>0</sub>+a<sub>1</sub>x=0, где a<sub>0</sub> , a<sub>1 </sub>&ndash; целые числа.</p>

<p><strong><u>Т.8.3.(1) Теорема</u></strong></p>

<p><strong>Множество вычислимых действительных чисел&nbsp; счетно.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p>Вычислимые числа включают в себя все алгебраические и некоторые трансцендентные числа. <img src="file:///C:/Users/3671~1/AppData/Local/Temp/msohtmlclip1/01/clip_image009.gif" style="height:2px; width:2px" />Так как каждому вычислимому действительному числу соответствует хотя бы одна машина Тьюринга, а машин Тьюринга - &alefsym;<sub>0</sub>, то значит вычислимых чисел никак не больше,&nbsp; чем &alefsym;<sub>0</sub>. С другой стороны, поскольку все алгебраические числа вычислимы, а их тоже &alefsym;<sub>0</sub>, то вычислимых действительных чисел никак не меньше, чем &alefsym;<sub>0</sub>. Значит мощность множества вычислимых действительных чисел равна &alefsym;<sub>0</sub> и, следовательно, это множество счетно, <strong>Q.E.D.</strong></p>

<p><strong><u>Т.8.3.(2). Теорема</u></strong></p>

<p><strong>Существуют невычислимые действительные числа и их несчетное множество.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p>Существование невычислимых чисел следует хотя бы из того факта, что всего действительных чисел несчетное множество, а вычислимых &ndash; счетное. Значит должно существовать несчетное множество невычислимых действительных чисел, <strong>Q.E.D.</strong></p>

<p><em>Пример невычислимого действительного числа:</em></p>

<p>Пусть имеются&nbsp; Т<sub>i</sub>,&hellip;&hellip;,Т<sub>n</sub>,&hellip;, где i &ndash; i-ая машина Тьюринга.</p>

<p>Действительное число Х можно представить так:</p>

{!! HTML::image('img/library/Pic/8.4.JPG') !!}

<p>Такое число является невычислимым, так как задача об остановке машины Т<sub>i</sub> на чистой ленте алгоритмически не разрешима. &nbsp;</p>

			</article></article>	</div></div>
@stop
@section('js-down')
    <!-- BEGIN JAVASCRIPT -->
    {!! HTML::script('js/libs/jquery/jquery-1.11.2.min.js') !!}
    {!! HTML::script('js/libs/jquery/jquery-migrate-1.2.1.min.js') !!}
    {!! HTML::script('js/libs/bootstrap/bootstrap.min.js') !!}
    {!! HTML::script('js/libs/spin.js/spin.min.js') !!}
    {!! HTML::script('js/libs/autosize/jquery.autosize.min.js') !!}
    {!! HTML::script('js/libs/nanoscroller/jquery.nanoscroller.min.js') !!}
    {!! HTML::script('js/core/source/App.js') !!}
    {!! HTML::script('js/core/source/AppNavigation.js') !!}
    {!! HTML::script('js/core/source/AppOffcanvas.js') !!}
    {!! HTML::script('js/core/source/AppCard.js') !!}
    {!! HTML::script('js/core/source/AppForm.js') !!}
    {!! HTML::script('js/core/source/AppNavSearch.js') !!}
    {!! HTML::script('js/core/source/AppVendor.js') !!}
    {!! HTML::script('js/core/demo/Demo.js') !!}
    <!-- END JAVASCRIPT -->
@stop