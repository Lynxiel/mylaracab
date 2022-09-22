@extends('voyager::master')


@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i> Товары
    </h1>

@stop

@section('content')
    <div class="container-fluid" id="main-content">
        @include('voyager::alerts')
        @if ($cables)

            <div class="row">
                <div class="accordion col-lg-6 col-md-6 col-sm-12 col-xs-12" id="accordionCables">
                    <div class="row">
                        <div class="col-4"><h4>Кабели</h4></div>

                        <div class="col-4"></div>
                        <div class="col-4"></div>
                    </div>
                    @foreach($cables as $cable)

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$cable->cable_id}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$cable->cable_id}}" aria-expanded="true" aria-controls="collapse{{$cable->cable_id}}">
                                    {{$cable->title}} -  {{$cable->cable_group_id}}
                                </button>
                            </h2>
                            <div id="collapse{{$cable->cable_id}}" class="accordion-collapse collapse " aria-labelledby="heading{{$cable->cable_id}}" data-bs-parent="#accordionCables">
                                <div class="accordion-body">
                                    <form action="{{route('cables_save')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" readonly hidden name="cable_id" value="{{$cable->cable_id}}">
                                        <div class="form-group">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="title" value="{{$cable->title}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Группа кабеля</label>
                                            <input type="text" class="form-control" name="cable_group_id"  value="{{$cable->cable_group_id}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Метраж</label>
                                            <input type="text" class="form-control" name="footage"  value="{{$cable->footage}}" >
                                        </div>

                                        <div class="form-group">
                                            <label>Сечение жилы</label>
                                            <input type="text" class="form-control" name="coresize" value="{{$cable->coresize}}" >
                                        </div>

                                        <div class="form-group">
                                            <label>Количество жил</label>
                                            <input type="text" class="form-control" name="corecount"  value="{{$cable->corecount}}" >
                                        </div>

                                        <div class="form-group">
                                            <label>Максимальная нагрузка </label>
                                            <input type="text" class="form-control" name="capacity" value="{{$cable->capacity}}" >
                                        </div>

                                        <div class="form-group">
                                            <label>Наличие </label>
                                            <input type="text" class="form-control" name="instock"  value="{{$cable->instock}}" >
                                        </div>

                                        <div class="form-group">
                                            <label>Цена </label>
                                            <input type="text" class="form-control" name="price"  value="{{$cable->price}}" >
                                        </div>

                                        <input type="submit" value="Сохранить" class="btn btn-outline-success">
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

        @endif


        @if ($groups)
                <div class="accordion col-lg-6 col-md-6 col-sm-12 col-xs-12" id="accordionGroups">
                    <div class="row">
                        <div class="col-4"><h4>Группы</h4></div>
                        <div class="col-4"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newGroupModal">Добавить новую группу</button> </div>
                        <div class="col-4"></div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="newGroupModal" tabindex="-1" aria-labelledby="newGroupModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Новая группа</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('createGroup')}}" method="post" enctype="multipart/form-data">
                                        @csrf
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
                        </div>
                    </div>


                    @foreach($groups as $group)

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headinggr{{$group->cable_group_id}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsegr{{$group->cable_group_id}}" aria-expanded="true" aria-controls="collapsegr{{$group->cable_group_id}}">
                                    {{$group->cable_group_id}}. {{$group->title}}
                                </button>
                            </h2>
                            <div id="collapsegr{{$group->cable_group_id}}" class="accordion-collapse collapse " aria-labelledby="headinggr{{$group->cable_group_id}}" data-bs-parent="#accordionGroups">
                                <div class="accordion-body">
                                    <form action="{{route('updateGroup')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" readonly hidden name="cable_group_id" value="{{$group->cable_group_id}}">
                                        <div class="form-group">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="title" value="{{$group->title}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Описание</label>
                                            <textarea type="text" rows="5" class="form-control" name="description"   required> {{$group->description}}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Изображение</label>
                                            <input type="file" class="form-control" name="image" >
                                            @if ($group->image)
                                                <div class="image-group">
                                                    <button  class="btn btn-danger image-delete">Удалить изображение</button>
                                                    <img class="category-image" src="{{$group->image}}">
                                                </div>

                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Сертификат</label>
                                            <input type="file" class="form-control" name="files" >
                                        </div>


                                        <input type="submit" value="Сохранить" class="btn btn-outline-success mt-4">
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
            </div>

        @endif

            </div>

    </div>
    <script>
        $('.image-delete').on('click', function (e){

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = {
                cable_group_id: $(this).closest('form').find('input[name="cable_group_id"]').val(),
                image: $(this).closest('.form-group').find('img').attr('src'),
            };
            var type = "POST";
            var ajaxurl = 'deleteImage';

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                success: function (data) {
                   $('.image-group').remove();
                    console.log(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        })
    </script>



@stop


