@props([
    'id' => null,
    'collapsed' => true
])

@php
    //Generate id
  if ($id===null)
    $id = bin2hex(random_bytes(4));
@endphp

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-heading{{$id}}">
            <button class="accordion-button {{$collapsed?'collapsed':''}}" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$id}}" aria-expanded="{{$collapsed?'false':'true'}}" aria-controls="panelsStayOpen-collapse{{$id}}">
                {{$header}}
            </button>
        </h2>
        <div id="panelsStayOpen-collapse{{$id}}" class="accordion-collapse collapse {{$collapsed?'':'show'}}" aria-labelledby="panelsStayOpen-heading{{$id}}">
            <div class="accordion-body">
                {{$slot}}
            </div>
        </div>
    </div>

