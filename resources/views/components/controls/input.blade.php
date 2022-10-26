@props([
    'name',
    'label'   =>'',
    'value'   =>'',
    'type'    => 'text',
    'id'      => null,
    'required'=>  null,
    'class'   => 'form-control rounded-3',
    'addon'   => null
])

@php
  if ($id===null)
    $id = $name . '-' .  bin2hex(random_bytes(4));
@endphp

<input
    type="{{$type}}"
    name="{{$name}}"
    {{$required?'required':''}}
    class="{{$class}}"
    id="{{$id}}"
    value="{{old($name)?? $value}}" />
    @if ($label)<label
    for="{{$id}}">
    {{$label}}
</label> @endif
{{$slot}}
@error($name)
    <div class="alert alert-danger mt-1">
        {{$message}}
    </div>
@enderror

