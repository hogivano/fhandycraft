@extends('admin.layout.master')
@section('title')
Katalog
@endsection
@section('content')
<div class="container-fluid mt--8">
  <div class="row judul">
    <div class="col-lg-8">
      <a href="{{route('admin.katalog.new')}}">
        <button class="btn btn-icon btn-3 bg-white" type="button">
          <span class="btn-inner--icon"><i class="ni ni-fat-add text-black"></i></span>
        </button>
      </a>
    </div>
    <div class="col-lg-4">

    </div>
  </div>
    <div class="card shadow" style="margin-top: 20px">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Katalog</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive posts-list">
        <!-- Projects table -->
        <div class="posts-awal">
            <table id="table" class="w-100 table table-striped table-bordered table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="bg-white">Title</th>
                  <th scope="col" class="bg-white">Deskripsi</th>
                  <th scope="col" class="bg-white">Kategori</th>
                  <th scope="col" class="bg-white">Harga Terendah</th>
                  <th scope="col" class="bg-white">Harga Tertinggi</th>
                  <th scope="col" class="bg-white">Warna</th>
                  <th scope="col" class="bg-white">Dilihat</th>
                  <th scope="col" class="bg-white">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($katalog as $i)
                <tr>
                    <td>
                      {{ $i->title }}
                    </td>
                    <td>
                      {{ $i->description }}
                    </td>
                    <td>
                      {{ $i->Kategori->nama }}
                    </td>
                    <td>
                      {{ number_format($i->low_price) }}
                    </td>
                    <td>
                      {{ number_format($i->end_price) }}
                    </td>
                    <td>
                      {{ $i->color }}
                    </td>
                    <td>
                      {{ $i->view }}
                    </td>
                    <td>
                        <a class="btn btn-outline-light" style="padding: 5px 10px" href="{{ route('admin.katalog.edit', $i->id) }}" ><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.katalog.delete') }}" method="post">
                          {{ csrf_field() }}
                          <input type="text" hidden="hidden" name="id" value="{{ $i->id }}">
                          <button type="submit" class="btn btn-outline-light" style="padding: 5px 10px" onclick="return confirm('anda yakin menghapusnya?')" ><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
@endsection
