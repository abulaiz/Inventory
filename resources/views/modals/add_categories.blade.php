<div class="modal-dialog">
    <div class="modal-content">
        <form action="/category/add" method="POST">
            @csrf
            <div class="modal-header bg-success">
                <h4 class="modal-title text-white">Tambah Kategori</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="bank_code">Nama Kategori</label>
                    <input required value="{{ old('nama_kategori') }}" autocomplete="off" type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori Baru"></input>
                </div>
                <div class="form-group">
                    <label for="name">Inisial Kategori</label>
                    <input required value="{{ old('inisial') }}" autocomplete="off" type="text" placeholder="Tiga Huruf Inisial" maxlength="3" name="inisial" id="name" class="form-control"></input>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
</div>