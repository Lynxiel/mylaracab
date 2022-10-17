@props([
    'name',
    'value',
    'class',
    'nullable' =>true
])
@php
    $obj = new $class();
    $data  = $obj->all();
    $fieldname = $obj->getKeyName();

@endphp
<select class="form-control" name="{{$name}}">
    @if ($nullable)
        <option value="" {{$value?'':'selected'}} ></option>
    @endif

    @foreach($data as $key=>$item)
        <option
            value="{{$item->$fieldname}}"
            {{($value==$item->$fieldname)?' selected ':''}}  >
            {{$item->title}}
        </option>
    @endforeach
</select>
