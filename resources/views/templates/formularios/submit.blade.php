<label class ="{{ $class ?? null }} submit">
    <span>{{$label ?? $input}}</span>
    {{ Form::submit($input) }}
</label>
