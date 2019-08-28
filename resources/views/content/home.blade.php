@extends('layouts.master')
@section('title_site', 'Beranda')
@section('beranda', 'active')

@section('content')
<!--fitness stats-->
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
            <div class="float-left pl-2">
              <span class="grey darken-1 block">Age</span>
              <span class="font-large-3 line-height-1 text-bold-300">25</span>
            </div>
            <div class="float-left mt-2">
              <span class="grey darken-1 block">Years</span>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
            <div class="float-left pl-2">
              <span class="grey darken-1 block">Height</span>
              <span class="font-large-3 line-height-1 text-bold-300">185</span>
            </div>
            <div class="float-left mt-2">
              <span class="grey darken-1 block">cm</span>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
            <div class="float-left pl-2">
              <span class="grey darken-1 block">Weight</span>
              <span class="font-large-3 line-height-1 text-bold-300">64</span>
            </div>
            <div class="float-left mt-2">
              <span class="grey darken-1 block">Kg</span>
              <span class="block"><i class="ft-arrow-down deep-orange accent-3"></i></span>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-12 clearfix">
            <div class="float-left pl-2">
              <span class="grey darken-1 block">Body mass index</span>
              <span class="font-large-3 line-height-1 text-bold-300">22.3</span>
            </div>
            <div class="float-left mt-2">
              <span class="grey darken-1 block">Kg/m</span>
              <span class="block"><i class="ft-arrow-up success"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection