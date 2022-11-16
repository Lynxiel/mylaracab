<x-layouts.header/>
<x-layouts.nav-back />

<div class="bg-light">
    <div class="container py-4">
        @include('admin.partials.flashmessages')
        <a class="btn btn-secondary" href="{{route('cables.index')}}">Назад</a>
        <h2>Редактировать группу {{$cablegroup->title}} </h2>
    <form action="{{route('groups.update', ['group'=>$cablegroup->id])}}" method="post" enctype="multipart/form-data">
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
                    <label>Сертификат</label>
                    <input type="file" class="form-control" name="cert" >
                    @error('cert')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                    @if ($cablegroup->cert)

                        <img class="group-image" src="{{$cablegroup->cert}}">
                        <form method="post" action="{{route('deleteImage', ['group_id'=>$cablegroup->id])}}">
                            @method('delete')
                            @csrf
                            <input class="btn btn-danger mb-4" type="submit" value="Удалить сертификат" />
                        </form>
                    @endif



                </div>


            </div>
        </div>
    <input type="submit" value="Сохранить изменения" class="btn btn-outline-success mb-4">
</form>

        <form method="post" action="{{route('groups.destroy', ['group'=>$cablegroup->id])}}">
            @method('delete')
            @csrf
            <input class="btn btn-danger" type="submit" value="Удалить группу" />
        </form>


    </div>
</div>
</body>


