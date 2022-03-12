<label class ="{{ $class ?? null }}">
    <span>{{$label ?? $select}}</span>
    {{ Form::select($select,$data ?? [])}}
</label>
