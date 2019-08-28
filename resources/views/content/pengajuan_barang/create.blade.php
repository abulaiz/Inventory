@extends('layouts.master')
@section('title_site','Pengajuan Baru')
@section('pengajuan_baru','active')
@section('title_page','Form Pengajuan Barang')

@section('content')
<section id="listData">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
          <form class="form" method="POST" action="/submission/store">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label>Jenis Pengajuan Barang</label>
                <select class="selectizes" name="jenis_pengajuan">
                    <option value="" selected disabled>Pilih Jenis Pengajuan</option>
                    <option value="1">Kategori Baru</option>
                    <option value="2">Penambahan Stok</option>
                </select>                
              </div>              
              <div style="display: none;" class="form-group cat1">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" placeholder="Nama Kategori Baru" name="nama_kategori_barang">
              </div>  
              <div style="display: none;" class="form-group cat2">
                <label>Kategori Barang</label>
                <select class="selectizes" name="kategori_barang">
                    <option value="" selected disabled>Pilih Kategori Barang</option>
                    @foreach($category as $item)
                    <option value="{{ $item->id }}">{{ $_mono->decrypt($item->name) }}</option>
                    @endforeach
                </select>                
              </div>   
              <div style="display: none;" class="form-group cat2">
                <label>Jumlah Stok</label>
                <input type="number" class="form-control" name="jumlah_stok">
              </div>                                         
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary pull-right mb-2">
                <i class="fa fa-check-square-o"></i> Ajukan
              </button>
            </div>
          </form>            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('customJS')
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/selectize/selectize.css">
<script src="../../../app-assets/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../../../js/view/pengajuan_barang/create.js"></script>
<script type="text/javascript" src="../../../js/additional/cleanSelectize.js"></script>
@endsection
