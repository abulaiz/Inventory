@extends('layouts.master')
@section('title_site','Laporan Kehilangan')
@section('laporan_kehilangan','active')
@section('title_page','Daftar Kehilangan Barang')

@section('content')
<section id="listData">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="table-responsive table-data">
              <table class="table table-bordered table-hover" id="datatables">
                <thead>
                  <tr>
                    <td>Tanggal</td>
                    <td>Kategori Barang</td>
                    <td>Id Barang</td>
                    <td>Deskripsi Barang</td>
                    <td>Posisi Terakhir</td>
                    <td>Pelapor</td>
                    <td>Opsi</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $item)
                  <tr>
                    <td>{{ $item->movements->last()->created_at }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $_str->item_position($item->movements->last()->from_position, $item->movements->last()->from_unit) }}</td>
                    <td>{{ $item->movements->last()->user->name }}</td>
                    <td>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                      <div class="dropdown-menu" x-placement="bottom-start">
                        <a class="dropdown-item cancel"><i class="fa fa-share-square-o mr-1"></i>Batalkan Laporan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item delete"><i class="fa fa-trash mr-1"></i>Hapus Barang</a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<form style="display: none;" method="POST" id="delete_item_form" action="/item/delete">
  @csrf
</form>

<form style="display: none;" method="POST" id="cancel_report_form" action="/missing/cancel">
  @csrf
</form>
@endsection

@section('customJS')
<link rel="stylesheet" type="text/css" href="../../../assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="../../../assets/datatables/datatables.min.js"></script>
<script type="text/javascript" src="../../../js/additional/SimpleEnc.js"></script>

<script type="text/javascript" src="../../../js/view/laporan_kehilangan/index.js"></script>
@endsection
