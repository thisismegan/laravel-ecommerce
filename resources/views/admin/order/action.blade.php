<div class="input-group">
    <form action="{{ route('admin.order.update',$model->id) }}" method="POST" class="inline">
        @csrf
        <div class="input-group mb-3">
            @if($model->status == 'paid')
            <input type="text" class="form-control" name="resi" placeholder="Masukkan no resi">
            @endif
            <div class="input-group-append">
                <select name="status" class="form-control">
                    <option value="unpaid">Unpaid</option>
                    <option value="waiting">Waiting</option>
                    <option value="paid">Paid</option>
                    <option value="delivery">Delivery</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancel">Cancel</option>
                </select>
                <button type="submit" onclick="return confirm('Yakin nih udah bener2 di cek?')" class="btn btn-info">Simpan</button>
            </div>
        </div>
    </form>
</div>