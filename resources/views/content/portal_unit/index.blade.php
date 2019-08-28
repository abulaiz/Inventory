@extends('layouts.master')
@section('title_site','Portal Unit')
@section('portal_unit','active')
@section('title_page','Daftar Unit')

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
                    <td>Unit</td>
                    <td>Apartemen</td>
                    <td>Alamat</td>
                    <td>Jumlah Barang</td>
                    <td>Opsi</td>
                  </tr>
                </thead>
                <tbody>
                  @php $i = 1; $ids = []; @endphp
                  @foreach($unit as $item)
                  <tr>
                    @php $ids[] = $item->id; @endphp
                    <td>{{ $_mono->decrypt($item->unit_number) }}</td>
                    <td>{{ $_mono->decrypt($item->apartment_name) }}</td>
                    <td>{{ $_mono->decrypt($item->apartment_address) }}</td>
                    <td>{{ $item->items->where('position', '!=' ,'4')->count() }}</td>
                    <td>
                      <button data-id="{{ $i++ }}" class="btn-sm btn btn-outline-primary">Lihat Daftar Barang</button>
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

<script type="text/javascript" src="../../../js/view/portal_unit/index.js"></script>
@endsection
