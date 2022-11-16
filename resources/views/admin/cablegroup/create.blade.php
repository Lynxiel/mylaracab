<form action="{{route('groups.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h2 class="text-white">Создать группу</h2>
    <div class="form-group">
        <label class="text-white">Название</label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
        @error('title')
        <div class="alert alert-danger mt-1">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="text-white">Описание</label>
        <textarea type="text" class="form-control" name="description"  value="{{old('description')}}" required> </textarea>
        @error('description')
        <div class="alert alert-danger mt-1">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label class="text-white">Сертификат</label>
        <input type="file" class="form-control" name="cert" >
        @error('cert')
        <div class="alert alert-danger mt-1">{{$message}}</div>
        @enderror
    </div>


    <input type="submit" value="Создать группу" class="btn btn-success ">
</form>
