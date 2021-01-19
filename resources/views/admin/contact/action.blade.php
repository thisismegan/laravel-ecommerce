<form action="{{ route('admin.message.update') }}" method="POST" class="d-inline">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{ $model->id }}">
    <div class="input-group mb-3">
        <select name="status" class="custom-select">
            <option value="0">Pending</option>
            <option value="1">Solved</option>
        </select>
        <div class="input-group-append">
            <button type="submit" class="input-group-text" onclick="return confirm('Are you sure?')"><i class="fas fa-check"></i></button>
        </div>
    </div>
</form>