@extends('layouts.layout')
@section('content')
    <h3>Админская страничка</h3>
    <div class="row">
        <div class="col-6">
            <form action="admin/cable_create" method="post" enctype="multipart/form-data">
                @csrf
                <h3>Cоздать кабель</h3>
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                </div>

                <div class="form-group">
                    <label>Группа кабеля</label>
                    <input type="text" class="form-control" name="cable_group_id"  value="{{old('cable_group_id')}}" required>
                </div>

                <div class="form-group">
                    <label>Метраж</label>
                    <input type="text" class="form-control" name="footage"  value="{{old('footage')}}" required>
                </div>

                <div class="form-group">
                    <label>Сечение жилы</label>
                    <input type="text" class="form-control" name="coresize" value="{{old('coresize')}}" required>
                </div>

                <div class="form-group">
                    <label>Количество жил</label>
                    <input type="text" class="form-control" name="corecount"  value="{{old('corecount')}}" required>
                </div>

                <div class="form-group">
                    <label>Максимальная нагрузка </label>
                    <input type="text" class="form-control" name="capacity" value="{{old('capacity')}}" required>
                </div>

                <div class="form-group">
                    <label>Наличие </label>
                    <input type="text" class="form-control" name="instock"  value="{{old('instock')}}" required>
                </div>

                <div class="form-group">
                    <label>Цена </label>
                    <input type="text" class="form-control" name="price"  value="{{old('price')}}" required>
                </div>

                <input type="submit" value="Создать кабель" class="btn btn-outline-success">
            </form>
        </div>
        <div class="col-6">
            <form action="admin/group_create" method="post" enctype="multipart/form-data">
                @csrf
                <h3>Cоздать группу</h3>
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <textarea type="text" class="form-control" name="description"  value="{{old('description')}}" required> </textarea>
                </div>


                <div class="form-group">
                    <label>Изображение</label>
                    <input type="file" class="form-control" name="image" >
                </div>

                <div class="form-group">
                    <label>Сертификат</label>
                    <input type="file" class="form-control" name="files" >
                </div>


                <input type="submit" value="Создать группу" class="btn btn-outline-success">
            </form>
        </div>
    </div>





@endsection('content')



