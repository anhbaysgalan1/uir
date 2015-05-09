<html>
<body>
{!! Form::open(['method' => 'PATCH', 'route' => 'question_checktest']) !!}
<h1>Добро пожаловать в систему тестирования</h1>
<p>
@for ($i = 0; $i < $num_slot; $i++)
    {{ $text_parts[$i] }} <span><select name="{{$i}}">
            <option disabled selected>Вставьте пропущенное слово</option>
            @for ($j = 0; $j < $num_var[$i]; $j++)
                <option value="{{ $group_variants[$i][$j] }}">{{ $group_variants[$i][$j] }}</option>
            @endfor
            </select></span>
@endfor
{{ $text_parts[$num_slot] }} </p>


<input type="hidden" name="answer" value="{{ $answer }}">
<input type="hidden" name="type" value="{{ $type }}">
<input type="hidden" name="id" value="{{ $id }}">
<input type="submit" name="check" value="Ответить">
{!! Form::close() !!}
</body>
</html>