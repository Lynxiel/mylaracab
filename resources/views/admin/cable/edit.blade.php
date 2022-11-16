<x-layouts.header/>
<x-layouts.nav-back />


<div class="bg-light">
    <div class="container py-4">
        @include('admin.partials.flashmessages')

        <a class="btn btn-secondary text-end" href="{{route('cables.index')}}">Назад</a>
        <h2 class="mb-4">Редактировать кабель {{$cable->title}}</h2>
        <form action="{{route('cables.update' ,['cable'=>$cable->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mb-4">
            <label>Название</label>
            <x-controls.input type="text" class="form-control" name="title" :value="$cable->title" required />
        </div>

        <div class="form-group mb-4">
            <label>Группа кабеля</label>
            <select class="form-control" name="group_id">
                <option disabled>Выберите группу</option>
                <option></option>

                @foreach($groups as $group)
                    <option value="{{$group->id}}"
                            @if ($group->id == (old('group_id') ?? $cable->group_id))
                                selected
                                @endif
                    >{{$group->title}}</option>
                @endforeach
            </select>
            @error('group_id')
            <div class="alert alert-danger mt-1">
                {{$message}}
            </div>
            @enderror
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

</body>

