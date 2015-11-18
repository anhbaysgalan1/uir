﻿<!DOCTYPE html>
<html lang="en">
<head>
    <title>Чёрч</title>

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

</head>
<body>
<section>

    <nav class="navbar navbar-fixed-top style-primary">
        <div class="container">
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{URL::route('home')}}" class="btn">Главная</a></li>
                    <li><a href="{{URL::route('tests')}}" class="btn">Система тестирования</a></li>
                    <li><a href="{{URL::route('library_index')}}" class="btn">Библиотека</a></li>
                    <li><a href="{{URL::route('in_process')}}" class="btn">Машины Тьюринга</a></li>
                    <li><a href="{{URL::route('in_process')}}" class="btn">Алгоритмы маркова</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{URL::route('logout')}}" class="btn">Выйти</a></li>
                </ul>
            </div>
        </div>
    </nav>

<!-- BEGIN CONTENT-->
<div id="content">

    <!-- BEGIN BLANK SECTION -->
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li>{!! HTML::linkRoute('home', 'Главная') !!}</li>
                <li>{!! HTML::linkRoute('library_index', 'Библиотека') !!}</li>
                <li>{!! HTML::linkRoute('library_persons', 'Персоналии') !!}</li>
                <li class="active">Чёрч</li>
            </ol>
        </div><!--end .section-header -->
    </section>
    <div class="card card-tiles style-default-light" style="margin-left:2%; margin-right:2%">
        <article class="style-default-bright">
            <div class="card-body">
		<article style="margin-left:10%; margin-right:10%; text-align: justify">
			
<p><strong>Алонзо Черч</strong></p>

<p>{!! HTML::image('img/library/persons/cherch1.jpg', 'cherch', array('style' => 'float:left; height:353px; width:264px')) !!}<strong>Происхождение.</strong> Алонзо Чёрч родился 14 июня в 1903 году в Вашингтоне, федеральный округ Колумбия. Его отец, Самюэль Роббинс Чёрч, был судьей в муниципальном суде федерального округа Колумбия до тех пор, пока потеря зрения и слуха не вынудили его покинуть этот пост. Семья переехала в Вирджинию, где и выросли Алонзо Чёрч и его младший брат. Он был не первым выдающимся математиком в семье: его прадедушка, так же Алонзо Чёрч, был профессором математики и астрономии и президентом колледжа имени Франклина, ставшего в последствии Университетом Джорджии.</p>

<p><strong>Образование.</strong> У Алонзо Чёрча был дядя, также Алонзо Чёрч, который помогал семье финансово, проявляя интерес к образованию детей. Благодаря дяде, Чёрч ходил в Риджфилдскую подготовительную школу (частную среднюю школу, которая готовит к поступлению в колледж) в Коннектикуте. Там с ним произошёл несчастный случай: в ходе какой-то странной истории с пневматической винтовкой, Чёрч остался слепым на один глаз.</p>

<p>После окончания Риджфилдской школы Чёрч поступил в Принстон, где до этого так же учились трое его дядь, а впоследствии и его внук. Некоторое время ему пришлось работать на полставки в столовой, чтобы оплачивать своё проживание. Но это не помешало Чёрчу проявить свои выдающиеся способности, и, ещё студентом, он пишет свою первую научную работу. В 1924 году он получил степень бакалавра математики. Затем он продолжил обучение в Принстоне под руководством Освальда Веблена. Именно в это время Чёрч начинает интересоваться логикой. Как-то Освальд Веблен попросил его изучить работы Дэвида Гилберта, под предлогом, что сам он в них не разобрался и надеялся, что Чёрч ему всё объяснит.</p>

<p><center>{!! HTML::image('img/library/persons/cherch2.jpg', 'cherch', array('style' => 'float:left; height:285px; width:570px')) !!}</center></p>

<p><strong>Жизнь</strong>. Будучи аспирантом, он женился в 1925 на Мэри Джулии Казински. Летом 1924 года Чёрч оступился на бордюре и был задет проезжавшим со стороны его слепого глаза трамваем; Мэри была стажером-медсестрой в больнице. Они были неразлучны последующие 51 год, до самой смерти Мэри в 1976. Мэри отлично готовила, и многие математики любили обедать в доме Чёрча. У него и Мэри было уже трое детей. Первая его дочь, Мэри Энн, родилась в 1933 (она позже вышла замуж за логика Джона Эддисона), а в 1938 вторая, которую он назвал в честь своей матери Милдред.</p>

<p>Живя в Принстоне в 60-ые, Чёрч и его семья любили ездить на Багамы. Со временем Чёрч приобрел там собственность и построил два двухквартирных дома. Даже после переезда в Лос-Анджелес, Чёрч проводил лето на Багамах. Но он не проводил своё время, лежа на пляже, скорее это было место, где он просто мог от всего скрыться и, в то же время, где его внуки и правнуки могли собраться вместе.</p>

<p>Чёрч умер в Гудзоне, Огайо, где жил его сын, 11 августа 1995, в возрасте 92 лет. Он был похоронен на Принстонском кладбище рядом со своей женой и родителями. Все бумаги, которые он оставил, были переданы библиотеке Принстонского университета.</p>

<p><strong>Карьера.</strong> В 1927 году Чёрч защитил докторскую диссертацию, после чего ему была присуждена двухгодичная национальная научно-исследовательская стипендия, и, после работы преподавателем в Университете Чикаго летом 1927, он провел два года, посетив сначала Гарвард (1927-28), а затем Гёттинген и Амстердам (1928-29). В Европу Чёрч отправился вместе со своей женой, и в Амстердаме у них родился первый ребенок, Алонзо Чёрч младший. В этой поездке Чёрч познакомился со многими математиками. В частности, в Гёттингене он встретился с Дэвидом Гилбертом, а в Амстердаме он очень заинтересовался работами Брауэра.</p>

<p><center>{!! HTML::image('img/library/persons/cherch3.jpg', 'cherch', array('style' => 'float:left; height:390px; width:500px')) !!}</center></p>

<p>В конце его срока как стипендиата научно-исследовательской стипендии он был приглашен вернуться на факультет математики в Принстон, чтобы начать здесь свою преподавательскую карьеру. Он был старшим преподавателем в 1929-39, доцентом в 1939-47 и профессором в 1947-67 (математики и философии в 1961-1967).</p>

<p>В начале своей карьеры Чёрч привел Библиографию символической логики &ndash; полную, снабжённую комментариями и ссылками библиографию каждой публикации по символической логике того времени. Таким образом, будет преуменьшением сказать, что он был просто осведомлен о литературе: он читал, организовывал и индексировал по авторам и предмету эту литературу. Конечно, литература была на разных языках. Чёрч не только обладал широкими знаниями современных языков, но также изучал латынь и греческий. Кроме того, Чёрч регулярно читал научные журналы. Он не любил, когда авторы делали ошибки и, известно, что он несколько раз писал издателям.</p>

<p>В 1930-ые Принстон был центром развития математической логики. Там был Чёрч вместе со своими студентами Россером и Клини, Джон фон Нейман, Алан Тьюринг, который думал над понятием эффективной вычислимости, приехал как выпускник университета в 1936 и остался для того, чтобы завершить докторскую диссертацию под руководством Чёрча. И Курт Гёдель, посетивший институт Расширенного обучения в 1933-34 (когда он читал лекции по своей теореме о неразрешимости) и 1935 перед тем, как в1940 переехать туда навсегда. С тех пор, как Чёрч побывал в Гёттингене и Амстердаме, он знал лично практически каждого логика.</p>

<p>{!! HTML::image('img/library/persons/cherch4.jpg', 'cherch', array('style' => 'float:left; height:340px; width:254px')) !!}В 1935 Чёрч был одним из основателей Ассоциации символической логики, а с 1936 редактором Журнала символической логики (The Journal of Symbolic Logic).</p>

<p>Поводом для ухода Чёрча из Принстона послужил отказ университета поддерживать маленький коллектив JSL после официального выхода Чёрча на пенсию, тем временем как Калифорнийский университет обещал поддерживать журнал до тех пор, пока Чёрч будет там главным редактором.</p>

<p>Так, Чёрч покинул Принстон в 1967 и переехал в Калифорнийский университет, где он был профессором математики и философии с 1967 по 1990год.</p>

<p>В 1979 Чёрч уволился из JSL, проработав там 44 года. Преподавать в Калифорнийском университете он закончил в 1990, в возрасте 87 лет, завершив преподавательскую карьеру, начатую 63 года назад. Но свою научно-исследовательскую работу он продолжал до конца своих дней.</p>

<p>В течение всей своей карьеры Чёрч руководил исследованиями аспирантов. 31 студент под его руководством защитили докторские диссертации, среди них Фостер, Тьюринг, Клини, Кемени, Бун и Смаллиан.</p>

<p>Алонзо Чёрч имел вежливые манеры джентльмена, выросшего в Вирджинии. Он никогда не был груб, даже с теми, с кем имел сильные разногласия. Глубоко религиозный человек, всю жизнь он был прихожанином Пресвитерианской церкви.</p>

<p>{!! HTML::image('img/library/persons/cherch5.jpg', 'cherch', array('style' => 'float:left; height:309px; width:210px')) !!}По характеру Чёрч был аккуратным и неторопливым &ndash; очень аккуратным и очень неторопливым. Его студенты могли это заметить уже на первом занятии по тому, как он вытирает доску. Материалы к лекциям Чёрч никогда не печатал, а писал от руки, всегда используя чернила нескольких цветов. Наиболее известными курсами, которые читал Чёрч, являются, безусловно, математическая логика и &lambda;-исчисление. Материалы к этим курсам послужили основой для двух книг Чёрча, ставших классическими, это &laquo;Introduction to Mathematical Logic&raquo; (&laquo;Введение в математическую логику&raquo;) и &laquo;The Calculi of Lambda-Conversion&raquo; (&laquo;Исчисления лямбда-преобразования&raquo;).</p>

<p>Чёрч принадлежал к большому количеству профессиональных организаций и получил много наград за свои достижения.</p>

<p><strong>Наиболее значимые научные достижения.</strong></p>

<p>Черч прославился разработкой таких работ, как &ldquo;Теорема Черча&rdquo; и &ldquo;Тезис Черча&rdquo;, которые впервые появились в печати в 1936 году. &ldquo;Теорема Черча&rdquo; предшествовала знаменитому исследованию&nbsp;Алана Тьюринга&nbsp;на тему&nbsp;проблемы остановки, в котором также было продемонстрировано существование задач, неразрешимых механическими способами и позже получила название &ldquo;Теорема Чёрча-Тьюринга&rdquo;. Эта &nbsp;теорема доказывает&nbsp;утверждение об отсутствии&nbsp;алгоритма, решающего&nbsp;проблему разрешения (Проблема разрешения&nbsp;(нем.&nbsp;<em>Entscheidungsproblem</em>)&nbsp;&mdash; задача из области&nbsp;оснований математики, сформулированная&nbsp;Давидом Гильбертом&nbsp;в&nbsp;1928 году: найти алгоритм, который бы принимал в качестве входных данных описание любой&nbsp;проблемы разрешимости&nbsp;(формального языка и математического утверждения <em>S</em> на этом языке), и после конечного числа шагов останавливался бы и выдавал один из двух ответов: &laquo;истина&raquo; или &laquo;ложь&raquo;, в зависимости от того, истинно или ложно утверждение <em>S</em>).</p>

<p>{!! HTML::image('img/library/persons/cherch6.jpg', 'cherch', array('style' => 'float:left; height:245px; width:188px')) !!}За теоремой &ldquo;Чёрча-Тюринга&rdquo; последовала разработка теории лямбда-исчислений. В 1941 году он опубликовал книгу &ldquo;The Calculi of Lambda-Conversion&rdquo; (&laquo;Исчисления лямбда-преобразования&raquo;) в Принстонском Университете. Она была переписана, и отредактированная версия лекций была отдана Чёрчем Принстонскому Университету для изучения лямбда-исчислений. Помимо прочего, его система&nbsp;лямбда-исчислений&nbsp;легла в основу&nbsp;функциональных языков программирования, в частности семейства&nbsp;Лисп.</p>

<p>Впоследствии Чёрч и Тьюринг показали, что лямбда-исчисления и&nbsp;машина Тьюринга имели одинаковые свойства, таким образом доказывая, что различные &laquo;механические процессы вычислений&raquo; могли иметь одинаковые возможности. Эта работа была оформлена как&nbsp;тезис Чёрча &mdash; Тьюринга. В терминах вычислимости по Тьюрингу, тезис гласит, что для любой алгоритмически вычислимой функции существует вычисляющая её значения&nbsp;машина Тьюринга. (Тезис Чёрча &mdash; Тьюринга &mdash; Дойча:&nbsp;любой конечный физический процесс, не использующий аппарат, связанный с непрерывностью и бесконечностью, может быть вычислен физическим устройством.)</p>

			</article></article>	</div></div>

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
</section>
</body>
</html>