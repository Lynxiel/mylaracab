<form action="{{route('groups.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Название</label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
        @error('title')
        <div class="alert alert-danger mt-1">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Описание</label>
        <textarea type="text" class="form-control" name="description"  value="{{old('description')}}" required> </textarea>
        @error('description')
        <div class="alert alert-danger mt-1">{{$message}}</div>
        @enderror
    </div>


    <div class="form-group">
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


    <input type="submit" value="Создать группу" class="btn btn-outline-success ">
</form>
