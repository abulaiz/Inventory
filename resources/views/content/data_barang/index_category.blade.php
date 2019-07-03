@extends('layouts.master')
@section('title_site','Data Barang')
@section('data_barang','active')
@section('title_page','Kategori Barang')

@section('button_header')
  <button class="btn btn-success" data-toggle="modal" data-target="#add" data-backdrop="static" data-keyboard="false">
    <i class="fa fa-plus mr-1"></i>Tambah Kategori</button>
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
                    <td>#</td>
                    <td>Kategori Barang</td>
                    <td>Inisial Kategori</td>
                    <td>Total Tersedia</td>
                    <td>Total Keilangan</td>
                    <td>Opsi</td>
                  </tr>
                </thead>
                <tbody>
                  @php $i = 1; $ids = []; @endphp
                  @foreach($data as $item)
                  <tr>
                    @php $ids[] = $item->id; @endphp
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->item->count() }}</td>
                    <td>{{ $item->item->count() }}</td>
                    <td>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                      <div class="dropdown-menu" x-placement="bottom-start">
                        <a class="dropdown-item more"><i class="fa fa-th mr-1"></i>Selengkapnya</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item delete"><i class="fa fa-times mr-1"></i>Hapus</a>
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

<div class="modal fade text-left" id="add" tabindex="-1" role="dialog"  aria-hidden="true">
  @include('modals.add_categories')
</div>

<p style="display: none;" id="ids">{{ json_encode($ids) }}</p>

<form style="display: none;" method="POST" action="/category/delete" id="delete_category_form">
  @csrf
</form>
@endsection

@section('customJS')
<link rel="stylesheet" type="text/css" href="../../../assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="../../../assets/datatables/datatables.min.js"></script>
<script type="text/javascript" src="../../../js/additional/SimpleEnc.js"></script>

<script type="text/javascript" src="../../../js/view/data_barang/index_category.js"></script>
@endsection
