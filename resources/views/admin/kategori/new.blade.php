@extends('admin.layout.master')
@section('title')
Kategori Baru
@endsection
@section('content')
<div class="container-fluid mt--6">
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Kategori Baru</h3>
                </div>
            </div>
        </div>
        <div class="table-responsive" style="padding: 5px 25px 20px 25px">
            <form action="{{ route('admin.kategori.create') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" type="text" class="form-control" placeholder="nama kategori">
                </div>
                <button name="btn_kategori" type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ route('admin.kategori')}}">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
