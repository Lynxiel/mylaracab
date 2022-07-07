@extends('layouts.layout')
@section('content')
    <h3>Админская страничка</h3>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Cоздать кабель</h3>
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="form-group">
            <label>Группа кабеля</label>
            <input type="text" class="form-control" name="cable_group_id" required>
        </div>

        <div class="form-group">
            <label>Метраж</label>
            <input type="text" class="form-control" name="footage" required>
        </div>

        <div class="form-group">
            <label>Сечение жилы</label>
            <input type="text" class="form-control" name="coresize" required>
        </div>

        <div class="form-group">
            <label>Количество жил</label>
            <input type="text" class="form-control" name="corecount" required>
        </div>

        <div class="form-group">
            <label>Максимальная нагрузка </label>
            <input type="text" class="form-control" name="capacity" required>
        </div>

        <div class="form-group">
            <label>Наличие </label>
            <input type="text" class="form-control" name="instock" required>
        </div>

        <div class="form-group">
            <label>Цена </label>
            <input type="text" class="form-control" name="price" required>
        </div>

        <input type="submit" value="Создать кабель" class="btn btn-outline-success">
    </form>



    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Cоздать группу</h3>
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea type="text" class="form-control" name="description" required> </textarea>
        </div>

        <div class="form-group">
            <label>Сертификат</label>
            <input type="file" class="form-control" name="file" >
        </div>

        <div class="form-group">
            <label>Изображение</label>
            <input type="file" class="form-control" name="img" >
        </div>

        <input type="submit" value="Создать группу" class="btn btn-outline-success">
    </form>
@endsection('content')



