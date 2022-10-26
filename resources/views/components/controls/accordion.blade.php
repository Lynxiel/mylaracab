
<div class="accordion-item mb-2">
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
