<html>
<body>
<div class="col-md-12 col-sm-6">
{!! Form::open(['method' => 'PATCH', 'route' => 'question_checktest', 'class' => 'smart-blue']) !!}
<h1>Вопрос {{ $count }}</h1>
<h2>{{ $text }}</h2>
<input type="hidden" name="num" value="{{ $id }}">
<input type="hidden" name="type" value="{{ $type }}">
@foreach ($variants as $var)
@if ($var == @$choice)
<input type="radio"  name="choice" value="{{ $var }}" checked> {{ $var }} <br>
@else
<input type="radio"  name="choice" value="{{ $var }}"> {{ $var }} <br>
@endif
@endforeach
{!! Form::close() !!}
<br>
</div>
</body>
</html>