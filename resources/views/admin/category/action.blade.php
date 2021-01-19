@if($model->id != 5)
<a class="btn btn-info btn-sm" href="{{ route('admin.category.edit',$model) }}">
    <i class="fas fa-pencil-alt">
    </i>
    Edit
</a>
<form action="{{ route('admin.category.destroy') }}" method="POST" class="d-inline">
    @csrf
    @method('delete')
    <input type="hidden" name="id" value="{{ $model->id }}">
    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">
        <i class="fas fa-trash">
        </i>
        Delete
    </button>
</form>
@endif