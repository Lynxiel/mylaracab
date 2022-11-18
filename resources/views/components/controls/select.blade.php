@props([
    'name',
    'title',
    'options',
    'value'=>'',
    'class'=>'',
    'fieldname'=>['title'],
    'nullable' =>true
])

<select class="form-control {{$class}}" name="{{$name}}">
    <option disabled selected>{{$title}}</option>
    @if ($nullable)
        <option></option>
    @endif

    @foreach($options as $key=>$item)
        <option
            value="{{$item->id}}"
            {{($value==$item)?' selected ':''}}  >
            @foreach ($fieldname as $title)
                {{$item->$title }}
            @endforeach
        </option>
    @endforeach
</select>
