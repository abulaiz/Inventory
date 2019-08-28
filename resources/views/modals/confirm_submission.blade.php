<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_confirm_submission" action="/submission/confirm" method="POST">
            @csrf
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">Konfirmasi Pengadaan Barang</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group cat1">
                    <label for="bank_code">Jumlah Penambahan Stok</label>
                    <input autocomplete="off" type="number" name="jumlah" class="form-control" min="1"></input>
                </div>
                <div class="form-group cat2">
                    <label for="name">Inisial Kategori</label>
                    <input autocomplete="off" type="text" placeholder="Tiga Huruf Inisial" maxlength="3" name="inisial" id="name" class="form-control"></input>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>