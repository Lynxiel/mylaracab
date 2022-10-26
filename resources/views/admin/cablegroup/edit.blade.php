<x-layouts.header/>
<x-layouts.nav >
    <x-controls.list text="Заказы" route="orders.index" classes="nav-link px-2 "/>
    <x-controls.list text="Товары" route="cables.index" classes="nav-link px-2 "/>
</x-layouts.nav>

<div class="content-container bg-light">
    <div class="px-4  container">
        <a class="btn btn-secondary" href="{{route('cables.index')}}">Назад</a>
        <h2>Редактировать группу {{$cablegroup->title}} </h2>
    <form action="{{route('groups.update', ['group'=>$cablegroup->cable_group_id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row mb-4">
            <div class="col-6">

                <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" name="title" value="{{old('title') ?? $cablegroup->title }}" required>
                    @error('title')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <textarea type="text" class="form-control" rows="9" name="description" required>{{old('description') ?? $cablegroup->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    @if ($cablegroup->image)
                        <img class="group-image" src="{{$cablegroup->image}}">
                    @endif
                    <label>Изображение</label>

                    <input type="file" class="form-control" name="image" >
                    @error('image')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label>Сертификат</label>
                    <input type="file" class="form-control" name="files" >
                    @error('files')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                </div>


            </div>
        </div>
    <input type="submit" value="Сохранить изменения" class="btn btn-outline-success mb-4">
</form>

        <form method="post" action="{{route('deleteImage', ['group_id'=>$cablegroup->cable_group_id])}}">
            @method('delete')
            @csrf
            <input class="btn btn-danger mb-4" type="submit" value="Удалить изображение" />
        </form>

        <form method="post" action="{{route('groups.destroy', ['group'=>$cablegroup->cable_group_id])}}">
            @method('delete')
            @csrf
            <input class="btn btn-danger" type="submit" value="Удалить группу" />
        </form>


    </div>
</div>
<div class="container mt-4">
    @include('admin.partials.flashmessages')
</div>

</body>


