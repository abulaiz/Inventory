@extends('layouts.master')
@section('title_site','Pengajuan Barang')
@section('laporan_pengajuan','active')
@section('title_page','Laporan Pengajuan Barang')

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
                    <td>Jenis Pengajuan</td>
                    <td>Kategori Barang</td>
                    <td>Jumlah</td>
                    <td>Opsi</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $item)
                  <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->new_category ? 'Kategori Baru' : 'Penambahan Stok' }}</td>
                    <td>{{ $item->new_category ? $item->category_name : $item->category->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                      <div class="dropdown-menu" x-placement="bottom-start">
                        <a class="dropdown-item cancel"><i class="fa fa-check mr-1"></i>Setujui Pengajuan</a>
                        <div class="dropdown-divider"></div>
                        @if(Auth::user()->hasRole('manager'))
                        <a class="dropdown-item delete"><i class="fa fa-times mr-1"></i>Tolak Pengajuan</a>
                        @elseif($item->status == '1wkwk')
                        <a class="dropdown-item delete"><i class="fa fa-times mr-1"></i>Batalkan Pengajuan</a>
                        @endif
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
