@extends('layouts.master')
@section('title_site','Data Barang')
@section('data_barang','active')
@section('title_page')
  {{ $data->name }}
@endsection

@section('button_header')
  <button class="btn btn-success" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#add">
    <i class="fa fa-plus mr-1"></i>Tambah Item</button>
@endsection

@section('breadcumb_nav')
    <li class="breadcrumb-item"><a href="/category">Data Barang</a>
    </li>
    <li class="breadcrumb-item active">Daftar Stok Barang</li>
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
                    <td>ID Barang</td>
                    <td>Deskripsi</td>
                    <td>Posisi</td>
                    <td>Update Terakhir</td>
                    <td>Opsi</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data->item->where('position', '!=', '4') as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->description }}</td>
                    <td>Di {{ $_str->item_position($item->position, $item->unit_id) }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                      <div class="dropdown-menu" x-placement="bottom-start">
                      
                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#edit" class="dropdown-item edit"><i class="fa fa-pencil-square-o mr-1"></i>Ubah Deskripis</a>

                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#update" class="dropdown-item update"><i class="fa fa-bolt mr-1"></i>Update Posisi</a>

                        <a class="dropdown-item history"><i class="fa fa-clock-o mr-1"></i>Riwayat Perpindahan</a>

                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item missing"><i class="fa fa-wpforms mr-1"></i>Laporkan Hilang</a>

                        <a class="dropdown-item delete"><i class="fa fa-times mr-1"></i>Hapus Stok</a>

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

<p class="element-parser" style="display: none;" id="category_id">{{ $data->id }}</p>

<form style="display: none;" method="POST" id="delete_item_form" action="/item/delete">
  @csrf
</form>

<form style="display: none;" method="POST" id="missing_item_form" action="/missing/add">
  @csrf
</form>

<div class="modal fade text-left" id="add" tabindex="-1" role="dialog"  aria-hidden="true">
  @include('modals.add_items')
</div>
<div class="modal fade text-left" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
  @include('modals.edit_items')
</div>
<div class="modal fade text-left" id="update" tabindex="-1" role="dialog"  aria-hidden="true">
  @include('modals.update_position')
</div>
@endsection

@section('customJS')

<link rel="stylesheet" type="text/css" href="../../../assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="../../../assets/datatables/datatables.min.js"></script>
<script type="text/javascript" src="../../../js/additional/SimpleEnc.js"></script>

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/selectize/selectize.css">
<script src="../../../app-assets/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../../../js/view/data_barang/index_item.js"></script>
<script type="text/javascript" src="../../../js/additional/cleanSelectize.js"></script>
@endsection
