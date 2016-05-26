@extends('templates.base')
@section('head')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<title>Список вопросов</title>
<style>
    #find:hover{
        background-color: #db8300;
        color: #ffffff;
        border-color: #db8300
    }
</style>
@stop

@section('content')
<div class="col-md-12 col-sm-6 card style-primary text-center">
    <h1 class="">Список вопросов</h1>
</div>

<div class="card col-lg-offset-0 col-md-12 col-sm-6">
    <div class="card-body">
        <div class="form">
            <form action="{{URL::route('questions_find')}}" method="POST" class="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-md-6 floating-label">
                    <input name="title" type="text" class="form-control" id="title">
                    <label for="title">Текст вопроса</label>
                </div>
                <div class="form-group col-md-6">
                    <select name="section" id="section" class="form-control" size="1">
                        <option value="Все">Все</option>
                        @foreach ($sections as $section)
                        <option value="{{ $section['section_name'] }}">{{ $section['section_name'] }}</option>
                        @endforeach
                    </select>
                    <label for="section">Раздел</label>
                </div>
                <div class="form-group col-md-6">
                    <select name="theme" id="theme" class="form-control" size="1">
                        <option value="Все">Все</option>
                        @foreach ($themes as $theme)
                        <option value="{{ $theme['theme_name'] }}">{{ $theme['theme_name'] }}</option>
                        @endforeach
                    </select>
                    <label for="theme">Тема</label>
                </div>
                <div class="form-group col-md-6">
                    <select name="type" id="type" class="form-control" size="1">
                        <option value="Все">Все</option>
                        @foreach ($types as $type)
                        <option value="{{ $type['type_name'] }}">{{ $type['type_name'] }}</option>
                        @endforeach
                    </select>
                    <label for="type">Тип</label>
                </div>
                <div class="col-sm-6">
                    <input id="find" class="btn btn-warning btn-lg col-md-4 col-md-offset-4 style-primary"
                           type="submit" name="find" value="Найти">
                </div>
            </form>
        </div>
    </div>
</div>

<?php $i = 0 ?>
@foreach($questions as $question)
    <div class="col-md-12">
        <div class="card card-bordered style-primary card-collapsed">
            <div class="card-head">
                <div class="tools">
                    <div class="btn-group">
                        <div class="btn-group">
                            <a href="#" class="btn btn-icon-toggle dropdown-toggle" data-toggle="dropdown"><i class="md md-colorize"></i></a>
                        </div>
                        <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                        <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                    </div>
                </div>
                <header>
                    Тема: {{ $question['theme'] }} <br>
                    Текст: {{ substr($question['title'], 0, 160) }}
                </header>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright" style="display: none">
                <p><?php echo $widgets[$i]; $i++ ?></p>
            </div><!--end .card-body -->
        </div><!--end .card -->
    </div>
@endforeach
<?php echo $questions->render(); ?>
@stop

@section('js-down')
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
@stop