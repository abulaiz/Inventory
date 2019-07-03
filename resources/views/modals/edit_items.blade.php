<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_edit_stok" action="/item/update" method="POST">
            @csrf
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="edit_title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="bank_code">Deskripsi</label>
                    <input required value="{{ old('deskripsi') }}" autocomplete="off" type="text" name="deskripsi" class="form-control" min="1"></input>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>