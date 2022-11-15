<x-layouts.header/>
<x-layouts.nav-back />

<div class="content-container bg-light">
    <div class="container">
        <a class="btn btn-secondary text-end" href="{{route('cables.index')}}">Назад</a>
        <h2 class="mb-4">Редактировать кабель {{$cable->title}}</h2>
        <form action="{{route('cables.update' ,['cable'=>$cable->cable_id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mb-4">
            <label>Название</label>
            <input type="text" class="form-control" name="title" value="{{$cable->title}}" required>
        </div>

        <div class="form-group mb-4">
            <label>Группа кабеля</label>
            <select class="form-control" name="cable_group_id">
                <option disabled>Выберите группу</option>
                <option></option>

                @foreach($groups as $group)
                    <option value="{{$group->cable_group_id}}"
                            @if ($group->cable_group_id == (old('cable_group_id') ?? $cable->cable_group_id))
                                selected
                                @endif
                    >{{$group->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4">
            <label>Метраж, м</label>
            <x-controls.input type="text" class="form-control" name="footage"  :value="$cable->footage" />
        </div>
        <div class="form-group mb-4">
            <label>Наличие, м </label>
            <x-controls.input type="text" class="form-control" name="instock"  :value="$cable->instock" />
        </div>

        <div class="form-group mb-4">
            <label>Цена, ₽ </label>
            <x-controls.input type="text" class="form-control" name="price"  :value="$cable->price" />
        </div>

        <input type="submit" value="Сохранить" class="btn btn-outline-success cable_save">
    </form>
    </div>
    </div>
<div class="container">
    @include('admin.partials.flashmessages')
</div>

</body>

