<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_add_stok" action="/item/add" method="POST">
            @csrf
            <div class="modal-header bg-success">
                <h4 class="modal-title text-white">Tambah Stok Barang</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="bank_code">Jumlah Penambahan Stok</label>
                    <input required value="{{ old('jumlah') }}" autocomplete="off" type="number" name="jumlah" class="form-control" min="1"></input>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
</div>