@props([
    'heading',
    'label'=> 'Модальная форма',
    'id' => null,

])

@php
    //Generate id
  if ($id===null)
    $id = 'modal-'.bin2hex(random_bytes(4));
@endphp



<!-- Button trigger modal -->
<button type="button" class="btn btn-danger mt-4" data-bs-toggle="modal" data-bs-target="#{{$id}}">
    {{$label}}
</button>

<!-- Modal -->
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if (isset($heading))
                <div class="modal-header">
                    <h5 class="modal-title">{{$heading}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @endif
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer">
                {{isset($footer)??$footer}}
            </div>
        </div>
    </div>
</div>
