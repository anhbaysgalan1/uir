<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" >
<head>
    @yield('head')
    {!! HTML::style('css/bootstrap.css') !!}
    {!! HTML::style('css/full.css') !!}
    {!! HTML::style('css/materialadmin.css') !!}
    {!! HTML::style('css/material-design-iconic-font.min.css') !!}
    {!! HTML::style('css/materialadmin_demo.css') !!}
    {!! HTML::script('js/jquery.js') !!}
</head>
<body class="@yield('background', '')">
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

<div class="section-body" style="margin-top: 80px;">
@yield('content')
</div>
</section>

@yield('js-down')
{!! HTML::script('js/libs/jquery/jquery-1.11.2.min.js') !!}
{!! HTML::script('js/libs/jquery/jquery-migrate-1.2.1.min.js') !!}
{!! HTML::script('js/libs/bootstrap/bootstrap.min.js') !!}
</body>
</html>