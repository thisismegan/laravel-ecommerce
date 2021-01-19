<form action="{{ route('admin.product.delete',$model) }}" class="d-inline" method="POST">
    @csrf
    @method('delete')
    <input type="hidden" name="id" value="{{ $model->id }}">
    <input type="hidden" name="image" value="{{ $model->image}}">
    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus User ini?')">
        <i class="fas fa-trash">
        </i>
    </button>
</form>
<a class="btn btn-info btn-sm" href="{{ route('admin.user.show',$model) }}">
    <i class="fas fa-pencil-alt">
    </i>
</a>