<label class ="{{ $class ?? null }}">
    <span>{{$label ?? $input}}</span>
    {{ Form::date($input, $value ?? null)}}
</label>
