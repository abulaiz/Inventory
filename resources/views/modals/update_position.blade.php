<div class="modal-dialog">
    <div class="modal-content">
        <form id="form_update_position" action="/item/move" method="POST">
            @csrf
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="update_position_title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pindahkan posisi ke : </label>
                    <select class="selectizes">
                        <option value="" selected disabled>Pilih Tujuan</option>
                        <option value="1">Gudang</option>
                        <option value="2">Unit</option>
                        <option value="3">Laundri</option>
                    </select>
                </div>
                <div class="form-group" style="display: none;" id="units">
                    <label>Unit : </label>
                    <select class="selectizes">
                        <option value="" disabled selected>Pilih Unit</option>
                        @foreach($units as $item)
                        <option value="{{ $item->id }}">{{ $item->unit_number }} - {{ $item->apartment_name }}</option>
                        @endforeach
                    </select>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Pindahkan</button>
            </div>
        </form>
    </div>
</div>