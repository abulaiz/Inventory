@extends('layouts.master')
@section('title_site','Portal Unit')
@section('portal_unit','active')
@section('title_page')
  Unit {{ $_mono->decrypt($unit->unit_number) }}
@endsection

@section('button_header')
  <button class="btn btn-success" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#add">
    <i class="fa fa-plus mr-1"></i>Pindahkan Barang ke Unit</button>
@endsection

@section('breadcumb_nav')
    <li class="breadcrumb-item"><a href="/unit">Portal Unit</a>
    </li>
    <li class="breadcrumb-item active">Daftar Barang</li>
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
                    <td>Tanggal Masuk</td>
                    <td>ID Barang</td>
                    <td>Deskripsi</td>
                    <td>Opsi</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($unit->items->where('position', '!=', '4') as $item)
                  <tr>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                      <div class="dropdown-menu" x-placement="bottom-start">
                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#update" class="dropdown-item update"><i class="fa fa-bolt mr-1"></i>Pindahkan Posisi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item missing"><i class="fa fa-wpforms mr-1"></i>Laporkan Hilang</a>
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
