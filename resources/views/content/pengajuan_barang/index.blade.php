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
                    @if(!Auth::user()->hasRole('manager'))
                    <td>Status</td>
                    @endif
                    <td>Opsi</td>
                  </tr>
                </thead>
                <tbody>
                  @php $ids = []; $i=1; @endphp
                  @foreach($data as $item)
                  @php $ids[] = $item->id; @endphp
                  <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->new_category ? 'Kategori Baru' : 'Penambahan Stok' }}</td>
                    <td>{{ $item->new_category ? $item->category_name : $_mono->decrypt($item->category->name) }}</td>
                    <td>{{ $item->qty }}</td>
                    @if(!Auth::user()->hasRole('manager'))
                    <td>{{ $_str->status_submission($item->status) }}</td>
                    @endif
                    <td>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                      <div class="dropdown-menu" data-id="{{$i++}}" x-placement="bottom-start">
                        @hasrole('manager')
                        <a class="dropdown-item confirm" data-toggle="modal" data-target="#confirm" data-backdrop="static" data-keyboard="false"><i class="fa fa-check mr-1"></i>Setujui Pengajuan</a>
                        @endhasrole
                        @if(!Auth::user()->hasRole('manager') && $item->status != '1')
                        <a class="dropdown-item understood"><i class="fa fa-check mr-1"></i>Mengerti</a>
                        @endif
                        @if(Auth::user()->hasRole('manager'))
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item reject"><i class="fa fa-times mr-1"></i>Tolak Pengajuan</a>
                        @elseif($item->status == '1')
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item cancel"><i class="fa fa-times mr-1"></i>Batalkan Pengajuan</a>
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

<p style="display: none;" id="ids">{{ json_encode($ids) }}</p>

<form style="display: none;" method="POST" id="reject_submission_form" action="/submission/reject">
  @csrf
</form>

<form style="display: none;" method="POST" id="delete_submission_form" action="/submission/delete">
  @csrf
</form>

<div class="modal fade text-left" id="confirm" tabindex="-1" role="dialog"  aria-hidden="true">
  @include('modals.confirm_submission')
</div>

@endsection

@section('customJS')
<link rel="stylesheet" type="text/css" href="../../../assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="../../../assets/datatables/datatables.min.js"></script>
<script type="text/javascript" src="../../../js/additional/SimpleEnc.js"></script>

<script type="text/javascript" src="../../../js/view/pengajuan_barang/index.js"></script>
@endsection
