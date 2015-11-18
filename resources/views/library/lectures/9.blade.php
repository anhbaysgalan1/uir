@extends('templates.base')
@section('head')
    <title>Лекция 9</title>

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
                <li class="active">Лекция 9.</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
        </div><!--end .section-body -->
    </section>
    <div class="card card-tiles style-default-light" style="margin-left:2%; margin-right:2%">
        <article class="style-default-bright">
            <div class="card-body">
                <article style="margin-left:10%; margin-right:10%; text-align: justify">
	
<p><strong style="line-height:1.6em">&sect; 9.1. </strong><strong style="line-height:1.6em">Теорема Кантора</strong></p>

<p><strong style="line-height:1.6em"><u>Т.9.1. (1) Теорема Кантора</u></strong></p>

<p><strong>Для любого кардинального числа &alpha; справедливо &alpha;&lt;2<sup>&alpha;</sup>.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p><em>1. Докажем, что по крайней мере <strong>&alpha;&le;2<sup>&alpha;</sup></strong> </em></p>

<p>Как известно, мощность булеана множества М равна 2<sup>|М|</sup>. Пусть множество М = {m<sub>1</sub>, m<sub>2</sub>, m<sub>3</sub>, &hellip;}. В булеан множества М (множество всех его подмножеств) в том числе входят множества, состоящие каждое из единственного элемента, например {m<sub>1</sub>},{m<sub>2</sub>},{m<sub>3</sub>}, &hellip;. Только такого вида подмножеств будет |М|, а кроме них в булеан входят и другие подмножества, значит, в любом случае |М|<strong>&le;</strong>2<sup>|М|</sup></p>

<p><em style="line-height:1.6em">2. Докажем строгость неравенства <strong>&alpha;&lt;2<sup>&alpha;</sup></strong></em></p>

<p>С учетом доказанного в п.1. достаточно показать, что не допустима ситуация, при которой <strong>&alpha;=2<sup>&alpha;</sup>. </strong>Предположим противное, пусть &alpha;=2<sup>&alpha;</sup>, т.е. |М| = 2<sup>|М|</sup>. Это означает, что М равномощно Р(М), значит существует отображение множества М на его булеан Р(М). Т.о. каждому элементу m множества M взаимно однозначно соответствует некоторое подмножество&nbsp; Мm, принадлежащее Р(М). Значит любой элемент m или принадлежит соответствующему ему подмножеству Мm, или не принадлежит. Построим множество M*, образованное из всех элементов второго рода (т.е. тех m, которые не принадлежат соответствующим им подмножествам Мm)</p>

<p>По построению видно, что если какой-либо элемент m принадлежит M*, значит он автоматически не принадлежит Мm. Это, в свою очередь означает, что ни для какого m невозможна ситуация M*=Мm. Значит, множество&nbsp; M* отлично от всех множеств Мm и для него нет взаимно-однозначного элемента m &nbsp;из множества M. Это в свою очередь означает, что&nbsp; равенство&nbsp; |М|= 2<sup>|М| &nbsp;</sup>неверно. Т.о. доказано, что |М|<strong>&lt;</strong> 2<sup>|М| </sup>&nbsp;или <strong>&alpha;&lt;2<sup>&alpha;</sup></strong>, <strong>Q.E.D.</strong></p>

<p>В приложении к рассмотрению бесконечных множеств, это убедительно доказывает, что множество всех подмножеств натуральных чисел (а это, по сути, множество комплексов бесконечной длины) НЕ равномощно множеству самих натуральных чисел. Т.е.&nbsp; &alefsym;<sub>0</sub> &ne; 2<sup>&alefsym;0</sup>. И значит, по аналогии, можно построить еще более обширное множество, например на основе действительных чисел. Иными словами, вопрос относительно других типов бесконечных множеств заключается в следующем: а существует ли множество мощности большей, чем мощность множества действительных чисел? Если такой вопрос будет решен положительно, сразу же встанет следующий: а существует ли множество еще большей мощности? Потом еще больше. И, наконец, логичный глобальный вопрос: а существует ли множество самой большой мощности?</p>

<p><strong style="line-height:1.6em"><u>Т.9.1. (2) Теорема</u></strong></p>

<p><strong>Для любого множества А найдется множество В, мощность которого больше А.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p>Рассмотрим множество <strong>В</strong> всех функций, заданных на множестве <strong>А</strong> и принимающих значения 0 и 1. Каждой точке <strong>а </strong>множества <strong>А</strong> поставим в соответствие функцию f<sup>a</sup>(x), принимающую в этой точке значение 1, а в остальных точках значение 0. Ясно, что разным точкам соответствуют разные функции. Отсюда следует, что мощность множества <strong>В</strong> не меньше мощности множества <strong>А</strong> (|<strong>B</strong>|&ge;|<strong>A</strong>|).</p>

<p>Предположим, что мощности множество <strong>А</strong> и <strong>В</strong> равны друг другу.&nbsp; В этом случае существует взаимно-однозначное соответствие между элементами множеств <strong>А</strong> и <strong>В</strong>. Обозначим функцию, соответствующую элементу <strong>а </strong>из множества <strong>А</strong>, через f<sub>a</sub>(x). Все функции семейства f<sub>a</sub>(x) принимают значение или 0 или 1.Построим новую функцию &phi;(x)=1- f<sub>х</sub>(x). Таким образом, чтобы найти значение функции &phi;(x)&nbsp; в некоторой точке <strong>а</strong>, принадлежащей множеству <strong>А</strong>, надо сначала найти соответствующую функцию f<sub>а</sub>(<strong>а</strong>) и затем вычесть из единицы значение этой функции в точке <strong>а</strong>. Из построения видно, что функция &phi;(x) также задана на множестве <strong>А</strong> и принимает значения 0 и 1. Следовательно, &phi;(x) является элементом множества <strong>В</strong>. Тогда существует такое число b в множестве А, такое что &phi;(x) = f<sub>b</sub>(x). С учетом ранее введенного определения функции &phi;(x)=1- f<sub>х</sub>(x), получим что для всех х, принадлежащих множеству <strong>А</strong>, верно 1 - f<sub>х</sub>(x)= f<sub>b</sub>(x). Пусть х = b. Тогда 1 - f<sub>b</sub>(b) = f<sub>b</sub>(b) и значит f<sub>b</sub>(b)=1/2. Данный результат явным образом противоречит тому, что значения функции f<sub>b</sub>(х) равны нулю или единице. Следовательно, принятое предположение неверно, а значит не существует взаимно-однозначного соответствия между элементами множеств <strong>А</strong> и <strong>В</strong> (<strong>|</strong><strong>A</strong><strong>|</strong>&ne;<strong>|</strong><strong>B</strong><strong>|</strong>). Поскольку <strong>|</strong><strong>A</strong><strong>|</strong>&ne;|<strong>B</strong><strong>|</strong> и при этом |<strong>B</strong><strong>|</strong>&ge;<strong>|</strong><strong>A</strong><strong>|</strong>, значит <strong>|</strong><strong>B</strong><strong>|</strong>&gt;|<strong>A</strong><strong>|</strong>. Это означает, что для любого множества <strong>А</strong> можно построить множество <strong>В</strong> большей мощности. Отсюда можно сделать вывод, что множества самой большой мощности не существует, <strong>Q.E.D.</strong></p>

<p><span style="line-height:1.6em">Существует довольно тесная связь между построенным множеством функций и булеаном множества </span><strong style="line-height:1.6em">А</strong><span style="line-height:1.6em"> (множеством всех подмножеств </span><strong style="line-height:1.6em">А</strong><span style="line-height:1.6em">). Рассмотрим множество </span><strong style="line-height:1.6em">В</strong><span style="line-height:1.6em"> всех подмножеств множества </span><strong style="line-height:1.6em">А</strong><span style="line-height:1.6em">. Пусть </span><strong style="line-height:1.6em">С</strong><span style="line-height:1.6em"> &ndash; некоторое подмножество в </span><strong style="line-height:1.6em">А</strong><span style="line-height:1.6em">. Возьмем функцию </span><em style="line-height:1.6em">f</em><em style="line-height:1.6em">(</em><em style="line-height:1.6em">x</em><em style="line-height:1.6em">)</em><span style="line-height:1.6em">, принимающую значении 1, если </span><em style="line-height:1.6em">х</em><span style="line-height:1.6em"> принадлежит </span><strong style="line-height:1.6em">С</strong><span style="line-height:1.6em">, и значение 0 в противном случае. Таким образом, разным подмножествам </span><strong style="line-height:1.6em">С</strong><span style="line-height:1.6em"> соответствуют различные функции. Наоборот, каждой функции </span><em style="line-height:1.6em">f</em><em style="line-height:1.6em">(</em><em style="line-height:1.6em">x</em><em style="line-height:1.6em">)</em><span style="line-height:1.6em">, принимающей два значения 0 и 1, соответствует подмножество в </span><strong style="line-height:1.6em">А</strong><span style="line-height:1.6em">, состоящее из тех элементов </span><em style="line-height:1.6em">х</em><span style="line-height:1.6em">, в которых функция принимает значение 1. Таким образом, установлено взаимно-однозначное соответствие между множеством функций, заданных на множестве </span><strong style="line-height:1.6em">А</strong><span style="line-height:1.6em"> и принимающих значения 0 и 1, и множеством всех подмножеств в </span><strong style="line-height:1.6em">А</strong><span style="line-height:1.6em">.</span></p>

<p><span style="line-height:1.6em">Итак, множества самой большой мощности не существует. Первые два трансфинитных числа имели в природе образующие их множества (множество натуральных чисел и множество действительных чисел). Если отталкиваться от множества континуума, то можно построить множество всех подмножеств континуума, получим его булеан, назовем это множество B</span><sub style="line-height:1.6em">R</sub><span style="line-height:1.6em">. По определению мощность множества B</span><sub style="line-height:1.6em">R</sub><span style="line-height:1.6em"> равна 2</span><sup style="line-height:1.6em">&alefsym;</sup><span style="line-height:1.6em">. Согласно теореме Кантора &nbsp;2</span><sup style="line-height:1.6em">&alefsym;</sup><span style="line-height:1.6em">&ne;&alefsym;. Очевидно, что множество B</span><sub style="line-height:1.6em">R</sub><span style="line-height:1.6em"> бесконечно, следовательно, его кардинальное число является числом трансфинитным и оно никак не может совпадать ни с одним из двух рассмотренных ранее трансфинитных чисел. А значит, в нашу шкалу пора вводить третье трансфинитное число.</span></p>

<p><strong style="line-height:1.6em"><u>Алеф-один (</u></strong><strong style="line-height:1.6em"><u>&alefsym;</u></strong><strong style="line-height:1.6em"><u><sub>1</sub></u></strong><strong style="line-height:1.6em"><u>) </u></strong><strong style="line-height:1.6em"><u>&ndash; третье трансфинитное число.</u></strong><span style="line-height:1.6em"> По определению, это мощность множества всех подмножеств континуума. Это же число соответствует мощности многих других множеств, например:</span></p>

<ul>
	<li>Множества всех линейных функций, принимающих любые действительные значения (линейная функция - действительная функции одной или нескольких переменных). По сути это множества всех возможных кривых в счетно-мерном пространстве, где количество измерений n &ndash; любое конечное число или даже &alefsym;<sub>0</sub>.</li>
	<li>Множества фигур на плоскости, т.е. множества всех подмножеств точек на плоскости или множества всех подмножеств пар действительных чисел.</li>
	<li>Множества тел в обычном трехмерном пространстве, а также, вообще говоря, в любом счетно-мерном пространстве, где количество измерений n &ndash; любое конечное число или даже &alefsym;<sub>0</sub>.</li>
</ul>

<p>Поскольку число &alefsym;<sub>1 </sub>вводится как мощность булеана множества с мощностью &alefsym;, получаем утверждение, что &alefsym;<sub>1</sub> =2<sup>&alefsym;</sup>.</p>

<h3><strong style="font-size:13px; line-height:1.6em"><em>Обобщенная континуум-гипотеза: </em></strong><span style="font-size:13px; line-height:1.6em">Для любого бесконечного множества </span><em style="font-size:13px; line-height:1.6em">S</em><span style="font-size:13px; line-height:1.6em"> не существует таких множеств, кардинальное число которых больше, чем у </span><em style="font-size:13px; line-height:1.6em">S</em><span style="font-size:13px; line-height:1.6em">, но меньше, чем у множества всех его подмножеств 2</span><em style="font-size:13px; line-height:1.6em"><sup>S</sup></em><span style="font-size:13px; line-height:1.6em">.</span></h3>

<p><strong style="line-height:1.6em">&sect; 9</strong><strong style="line-height:1.6em">.2. Парадоксы теории множеств</strong></p>

<p>Возникает резонный вопрос: а что дальше? Что будет, если построить множество всех подмножеств множества B<sub>R</sub> . (напомним, что B<sub>R</sub> &nbsp;есть множество всех подмножеств континуума). Чему будет равно его кардинальное число (конечно по аналогии можно предположить, что это 2<sup>&alefsym;</sup><sup>1</sup>) и, главное, какому реально существующему множеству это будет соответствовать? Есть ли вообще большие, чем B<sub>R</sub> бесконечные множества и сколько их?</p>

<p>Хотя нами показано, что наибольшего трансфинитного числа не существуют, как показывают исследования, восходить всё далее и далее к новым большим кардинальным числам небезопасно &ndash; это приводит к антиномии (парадоксам). Вполне естественно, что каждому математику хочется иметь дело с непротиворечивой теорией, т.е. такой, что в ней нельзя одновременно&nbsp; доказать две теоремы, явно отрицающие друг друга. Является ли теория Кантора непротиворечивой? До каких пределов можно расширять круг рассматриваемых множеств? К сожалению, не все так безоблачно. Если ввести такое внешне безобидное понятие как &laquo;множество всех множеств U&raquo;, то возникает ряд любопытных моментов.</p>

<p><strong style="line-height:1.6em"><u>Т.9.2.(1) Парадокс Кантора</u></strong></p>

<p style="margin-left:63.0pt"><strong style="line-height:1.6em">Кардинальное число множества всех подмножеств </strong><strong style="line-height:1.6em">P</strong><strong style="line-height:1.6em">(</strong><strong style="line-height:1.6em">U</strong><strong style="line-height:1.6em">) множества всех множеств </strong><strong style="line-height:1.6em">U</strong><strong style="line-height:1.6em"> не больше чем |</strong><strong style="line-height:1.6em">U</strong><strong style="line-height:1.6em">|.</strong></p>

<p style="margin-left:36.0pt"><strong><u>Доказательство</u></strong></p>

<p>Так как U содержит все мыслимые и возможные множества, то оно по логике вещей, содержит в частности и множество всех своих подмножеств. Более того, все элементы множества P(U) принадлежат U, следовательно, |P(U)| &le; |U|. Однако существует доказанная ранее Теорема Кантора, согласно которой для любого кардинального числа &alpha; справедливо: &alpha;&lt;2<sup>&alpha;</sup>. Т.о.,&nbsp; ввиду того, что P(U) - множество всех подмножеств U (булеан U), получим что&nbsp; &nbsp;|P(U)| &gt; |U|. Два полученных вывода&nbsp; |P(U)| &le; |U| и |P(U)| &gt; |U|&nbsp; прямо противоречат друг другу, что в принципе не должно быть возможно и является иллюстрацией парадокса, <strong>Q.E.D.</strong></p>

<p><strong style="line-height:1.6em"><u>Т.9.2.(2) Парадокс Рассела</u></strong></p>

<p><strong>Пусть В &ndash; множество всех множеств, которые не содержат самих себя в качестве своих собственных элементов. Тогда можно доказать две теоремы.</strong></p>

<p><strong style="line-height:1.6em"><u>Теорема 9.2.(2а).&nbsp; </u></strong><strong style="line-height:1.6em">В принадлежит В.</strong></p>

<p style="margin-left:36.0pt"><strong style="line-height:1.6em"><u>Доказательство</u></strong></p>

<p>Предположим противное, т.е. <strong>В</strong> не принадлежит <strong>В</strong>.&nbsp; Раз <strong>В</strong> не содержит себя в качестве своего собственного элемента, то, по определению, это означает, что <strong>В</strong> входит в рассматриваемый класс, то есть принадлежит <strong>В</strong>. Получили противоречие &ndash; следовательно, исходное предположение неверно и <strong>В</strong> принадлежит <strong>В</strong>, <strong>Q.E.D.</strong></p>

<p><strong style="line-height:1.6em"><u>Теорема 9.2.(2</u></strong><strong style="line-height:1.6em"><u>b)</u></strong><strong style="line-height:1.6em"><u>. </u></strong><strong style="line-height:1.6em">В не принадлежит В.</strong></p>

<p style="margin-left:36.0pt"><strong style="line-height:1.6em"><u>Доказательство</u></strong></p>

<p>Предположим противное, т.е. <strong>В</strong> принадлежит <strong>В</strong>. По определению множества <strong>В</strong> любой его элемент не может иметь себя в качестве собственного элемента, следовательно, <strong>В</strong> не принадлежит рассматриваемому классу, т.е. <strong>В</strong> не принадлежит <strong>В</strong>. Противоречие &ndash; следовательно, исходное предположение неверно и <strong>В</strong>&nbsp; не принадлежит <strong>В</strong>, <strong>Q.E.D.</strong></p>

<p><span style="line-height:1.6em">Нетрудно видеть, что Теоремы </span><strong style="line-height:1.6em"><u>9.2.(2а)</u></strong><span style="line-height:1.6em"> и </span><strong style="line-height:1.6em"><u>9.2.(2</u></strong><strong style="line-height:1.6em"><u>b</u></strong><strong style="line-height:1.6em"><u>)</u></strong><span style="line-height:1.6em"> исключают друг друга..</span></p>

<p><span style="line-height:1.6em">К сожалению, даже исключение из рассмотрения всех суперобширных множеств не спасает теорию Кантора. По сути, парадокс Рассела затрагивает логику, т.е. способы рассуждения, с помощью которых при переходе от одного истинного утверждения к другому образуются новые понятия.</span></p>

<p>Уже при выводе парадокса используется логический закон исключенного третьего, являющийся одним из неотъемлемых приемов рассуждений в классической математике (т.е. если истинно утверждение не-А, то ложно А). Если задуматься о сути вещей, то можно в целом уйти и от теории множеств, и от математики в целом.</p>

<p style="margin-left:35.4pt"><span style="line-height:1.6em">Введем необходимое определение.</span></p>

<p style="margin-left:35.4pt"><strong style="line-height:1.6em"><em><a name="90">Импредикабельным</a> </em></strong><em style="line-height:1.6em">называется свойство, которое не применимо само к себе.</em></p>

<p><span style="line-height:1.6em">Например, свойство быть сладким не применимо само к себе, потому что свойство быть сладким само по себе не сладкое, значит свойство быть сладким &ndash; импредикабельно. Зато свойство быть абстрактным, будучи абстрактным, разумеется, абстрактно, т.е. применимо само к себе, а значит по нашему определению не импредикабельно.</span></p>

<p><strong style="line-height:1.6em"><u>Т.9.3.(1) Парадокс</u></strong></p>

<p><strong>Пусть Р &ndash; некоторое свойство. Обладает ли само Р этим свойством Р? </strong>Данная теорема в том числе может быть сформулирована так: &laquo;свойство быть импредикабельным будет ли само по себе импредикабельно&raquo;?</p>

<p style="margin-left:36.0pt"><strong style="line-height:1.6em"><u>Доказательство</u></strong></p>

<p>Нетрудно показать две ветки рассуждений:</p>

<ol>
	<li>если это свойство импредикабельно, то значит не применимо само к себе, и, следовательно, свойство быть импредикабельным &nbsp;не является импредикабельным.</li>
	<li>если это свойство не импредикабельно само по себе, то значит оно применимо само к себе, и, следовательно, свойство быть импредикабельным&nbsp; по своей сути импредикабельно.</li>
</ol>

<p><span style="line-height:1.6em">Итак, напрашивается неутешительный вывод: свойство быть импредикабельным импредикабельно тогда и только тогда, когда оно не импредикабельно. С виду нелепость, на самом деле серьезный и даже в некотором смысле плачевный вывод. Возникает невольное ощущение, что сами законы мышления по своей сути противоречивы.</span></p>

<p><span style="line-height:1.6em">В литературе для иллюстрации подобных фактов часто используются более простые конструкции. Например, следующая.</span></p>

<p><strong style="line-height:1.6em"><u>Т.9.4. </u>Парадокс лжеца</strong></p>

<p><strong>То, что я утверждаю сейчас, ложно.</strong></p>

<p>Если это высказывание истинно, то оно ложно, и в то же время, если оно ложно, то истинно. Таким образом, оно противоречит &laquo;закону исключённого третьего&raquo; в двоичной логике. Считают, что этот парадокс был сформулирован представителем мегарской школы Евбулидом. Предложение такого рода принципиально не может быть ни доказано, ни опровергнуто в пределах того языка, на котором оно изложено. Парадокс &laquo;Лжеца&raquo; произвёл громадное впечатление на современников Евбулида. Существует даже легенда, что некий Филит Косский, отчаявшись разрешить этот парадокс, покончил с собой, а известный древнегреческий логик Диодор Кронос, дав обет не принимать пищу до тех пор, пока не найдёт решение &laquo;Лжеца&raquo;, умер, так и не разрешив проблему.</p>

<p><span style="line-height:1.6em">Далее приведем итоги многолетних исследований в этой сфере. Причинами появления парадоксов считаются:</span></p>

<ul>
	<li>Допущения теорией сверхобширных множеств типа &laquo;множества всех множеств&raquo;.</li>
	<li>Сверхобширные множества допускаются в качестве элементов некоторых объектов.</li>
	<li>Наблюдается непредикативность определений, т.е. в парадоксе та сущность, о которой идет речь, определяется или характеризуется посредством некоторой совокупности, к которой она сама принадлежит.</li>
</ul>

<p><span style="line-height:1.6em">В этой связи были сформулированы условия, которым должна удовлетворять теория множеств, свободная от парадоксов:</span></p>

<ul>
	<li>Включение в теорию всех основных достижений канторовской теории множеств.</li>
	<li>Непротиворечивость.</li>
</ul>

<p><span style="line-height:1.6em">Интересно, что был создан набор теорий множеств, для которых доказано первое условие, но ни для одной из них не доказано второе (впрочем показано, что известных парадоксов они не содержат, но это вовсе не означает, что нас не подстерегают парадоксы пока не известные). Если углубиться в первопричину противоречивости теории Кантора, надо с грустью признать, что как теория оперирования с бесконечностями она не полна в своем анализе понятия бесконечного. Пресловутое понятие &laquo;множество всех множеств&raquo; или &laquo;бесконечность бесконечностей&raquo; не поддается анализу Кантора. Т.о. теория Кантора имеет определенную границу применимости и попытки применить ее за границами этой области автоматом ведут к парадоксам. Иными словами, с философской точки зрения, попытки выразить в понятиях конкретной теории явление, находящееся вне пределов области, где эти понятия применимы, вызывает появление парадоксов.</span></p>

<p>К огромному сожалению, все попытки построить полную и непротиворечивую теорию закончились плачевно. Более того, было доказано, что это невозможно в принципе. Этот важнейший результат был получен австрийским логиком и математиком Куртом Гёделем, который в 1931 в статье &laquo;О формально неразрешимых предложениях Principia Mathematica и родственных систем&raquo; доказал первую теорему о неполноте, суть которой может быть сформулирована так: &laquo;если система Z (содержащая арифметику натуральных чисел) непротиворечива, то в ней существует такое предложение А, что ни само А, ни его отрицание не могут быть доказаны средствами Z&raquo;. Дальнейшие исследования позволили сформулировать вторую теорему о неполноте, сущность которой более глобальна:&nbsp; &laquo;непротиворечивость достаточно богатой теории не может быть доказана средствами этой теории. Однако вполне может оказаться, что непротиворечивость одной конкретной теории может быть установлена средствами другой, более мощной формальной теории. Но тогда встаёт вопрос о непротиворечивости этой второй теории, и т. д.&raquo;. В целом, математикам пришлось смириться с довольно грустным фактом: <strong>&laquo;Любая достаточно богатая формальная теория либо полна, либо непротиворечива&raquo;. </strong>Так устроен мир, и данный факт имеет значительные последствия по многих областях математики, философии, онтологии и философии науки.</p>


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