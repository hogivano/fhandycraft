@extends('admin.layout.master')
@section('title')
Katalog Baru
@endsection
@section('content')
<div class="container-fluid mt--6">
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Katalog Baru</h3>
                </div>
            </div>
        </div>
        <div class="table-responsive" style="padding: 5px 25px 20px 25px">
            <form action="{{ route('admin.katalog.create') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Judul</label>
                    <input name="title" type="text" value="{{ old('title') }}" required class="form-control" placeholder="judul produk">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" style="height: 100px" type="text" class="form-control" placeholder="deskripsi produk">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" required name="id_kategori">
                      <option value="">Pilih...</option>
                      @foreach($kategori as $i)
                      <option value="{{ $i->id }}" <?php if (old('id_kategori') == $i->id) echo 'selected'; ?>>{{ $i->nama }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Harga Terenda</label>
                        <input name="low_price" type="number" value="{{ old('low_price') }}" required class="form-control" placeholder="harga terendah">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Harga Tertinggi</label>
                        <input name="end_price" type="number" value="{{ old('end_price') }}" class="form-control" placeholder="harga tertinggi">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label>Warna Produk</label>
                    <input name="color" type="text" value="{{ old('color') }}" class="form-control" placeholder="hex color (#000)">
                </div>
                <div class="row" style="margin-bottom: 20px;">
                  <div class="col-lg-12 text-center">
                    <img src="{{ asset('img/profil.png') }}" id="img-upload" style="height: 180px; width: 180px; object-fit:cover" class="img-preview">
                  </div>
                  <div class="col-lg-12">
                    <div class="custom-file mt-4">
                      <input onchange="readURL(this);" type="file" class="custom-file-input" required name="image" id="inputGroupFile01">
                      <label class="custom-file-label" id="name-file" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="text-danger" style="margin: 10px 0;">
                  @if($errors->has('image'))
                  {{ $errors->first('image') }}
                  @endif
                </div>
                <button name="btn_kategori" type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ route('admin.katalog')}}">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
function filePreview(input){
  if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
          $('.img-preview').siblings('br').remove();
          $('.img-preview').remove();
          $('#poster').before('<br><img src="'+ e.target.result +'" alt="" class="img-preview"');
          console.log("true");
      }
  } else {
      console.log("false");
  }
}
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#img-upload')
              .attr('src', e.target.result)
              .height(200);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endscript
