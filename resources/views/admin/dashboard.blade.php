@extends('admin.layout.master')
@section('title')
Dashboard
@endsection
@section('link')
<style>
</style>
@endsection
@section('content')
<div class="container-fluid mt--7">
  <!-- Mask -->
  <span class="mask bg-primary" style="height:500px;"></span>
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-3">
    </div>
    <div class="col-md-3">
    </div>
  </div>
  <!-- Card stats -->
  <div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Katalog</h5>
              <span class="h2 font-weight-bold mb-0">{{ $katalog }}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                <i class="fas fa-store"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Kategori</h5>
              <span class="h2 font-weight-bold mb-0">{{ $kategori }}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                <i class="fas fa-tag"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
