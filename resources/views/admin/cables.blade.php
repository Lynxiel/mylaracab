<x-layouts.header/>
<x-layouts.nav-back />
<body>
<div class="bg-light">
    <div class="container py-4">
        @include('admin.partials.flashmessages')
        <div class="row text-content-justify w-100">
            <h2 class="mb-4 w-50">Группы</h2>
            <div class="w-50 text-end">
                <x-controls.modal label="Добавить новую группу">
                    <div class="text-start">
                        @include('admin.cablegroup.create')
                    </div>

                </x-controls.modal>

        </div>

        @php  $i=1; @endphp
        @if (!empty($groups))
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Изображение</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($groups as $group)
                        @php  $summ = 0;   @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td><a class="" href="{{route('groups.edit',['group'=>$group->cable_group_id])}}">{{$group->title}}</a></td>
                            <td>{{$group->description}}</td>
                            <td><img class="group-image" src="{{$group->image}}"></td>
                        </tr>

                    @endforeach
                    @else
                        <p>Кабелей пока нет</p>
                    @endif
                    </tbody>
                </table>
            </div>




        <h2 class="mb-4">Кабели</h2>
        @php  $i=1; @endphp
        @if (!empty($cables))
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Название</th>
                        <th scope="col">Группа</th>
                        <th scope="col">Метраж</th>
                        <th scope="col">Наличие</th>
                        <th scope="col">Цена</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($cables as $cable)
                        @php  $summ = 0;   @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td><a class="" href="{{route('cables.edit',['cable'=>$cable->cable_id])}}">{{$cable->title}}</a></td>
                            <td>{{$cable->group->title?? ''}}</td>
                            <td>{{$cable->footage}}м</td>
                            <td>{{$cable->instock}}м</td>
                            <td>{{$cable->price}}₽</td>
                        </tr>

                    @endforeach
                    @else
                        <p>Кабелей пока нет</p>
                    @endif
                    </tbody>
                </table>
            </div>


    </div>
</div>
</body>





