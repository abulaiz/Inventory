@extends('layouts.master')
@section('title_site','Laporan Kehilangan')
@section('laporan_kehilangan','active')
@section('title_page')
  Riwayat Perpindahan {{ $data->id }}
@endsection

@section('breadcumb_nav')
@if($data->position == '4')
    <li class="breadcrumb-item"><a href="/missing_item">Laporan Kehilangan</a>
    </li>
    <li class="breadcrumb-item active">Riwayat Perpindahan</li>
@else
    <li class="breadcrumb-item"><a href="/category">Data Barang</a>
    </li>
    <li class="breadcrumb-item"><a href="/item/{{$_enc->encrypt($data->category->id)}}">Daftar Stok ({{ $_mono->decrypt($data->category->name) }})</a></li>
    <li class="breadcrumb-item active">Riwayat Perpindahan</li>
@endif
@endsection


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
                    <td>Posisi Asal</td>
                    <td>Posisi Akhir</td>
                    <td>Dilaporkan Oleh</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data->movements as $item)
                  <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $_str->item_position($item->from_position, $item->from_unit) }}</td>
                    <td 
                    @if($item->to_position == '4') style="color:red;" @endif>
                    {{ $_str->item_position($item->to_position, $item->to_unit) }}</td>
                    <td>{{ $item->user->name }}</td>
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
@endsection

@section('customJS')

<link rel="stylesheet" type="text/css" href="../../../assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="../../../assets/datatables/datatables.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#datatables').DataTable({"order": [[ 0, 'desc' ]]});
  });  
</script>
@endsection
