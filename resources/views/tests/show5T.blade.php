<html>
<body>
{!! Form::open(['method' => 'PATCH', 'route' => 'question_checktest', 'class' => 'smart-blue']) !!}
<h1>Вопрос {{ $count }}</h1>
<input type="hidden" name="num" value="{{ $id }}">
<input type="hidden" name="type" value="{{ $type }}">
<table>
    <tr>
        <td>Утверждение</td>
        <td>Верно</td>
        <td>Неверно</td>
    </tr>
    <?php $i = 1;?>
    @foreach ($text as $row)
    <tr>
        <td> {{ $row }} </td>
        <td><input type="radio"  name="{{$i}}" value="1"></td>
        <td><input type="radio"  name="{{$i}}" value="0"></td>
        <td><input style="display: none;" type="radio"  name="{{$i}}" value="2" checked></td>
    </tr>
    <?php $i++;?>
    @endforeach
</table>
{!! Form::close() !!}
</body>
</html>