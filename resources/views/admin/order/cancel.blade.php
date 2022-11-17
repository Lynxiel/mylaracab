<form action="{{route('orders.destroy', ['order'=>$order->id] )}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3 mt-4">
        <input type="hidden" name="order_id" readonly value="{{$order->id}}">
        <textarea type="text" class="form-control rounded-3" name="cancel_comment"> </textarea>
        <label class="px-4" for="cancel_comment">Оставьте комментарий</label>
    </div>
    <button type="submit" class="btn btn-danger">Да</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
</form>
