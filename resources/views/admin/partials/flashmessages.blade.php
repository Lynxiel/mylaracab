@if (session('orderEdited'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Успешно отредактировано!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('cableUpdated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Кабель успешно отредактирован!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('groupCreated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Группа успешно создана!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('groupUpdated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Группа успешно изменена!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('groupdeleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Группа успешно удалена!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('imagedeleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Изображение удалено!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



