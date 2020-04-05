@extends('back.layouts.master')
@section('title','Ürün Oluştur')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="card shadow mb-4">
  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
  <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">
          @foreach($errors as $error)
            <li>{{$error}}</li>
          @endforeach

      </div>
      @endif

    <form method="post" action="{{route('product.create')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Ürün İsmi</label>
        <input type="text" name="name" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Ürün Kategorisi</label>
        <select class="form-control" name="category" required>
          <option value="">Seçim Yapınız</option>
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Ürün Fiyatı</label>
        <input type="text" name="price" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Stok Durumu</label>
        <input type="text" name="stock" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Ürün Fotoğrafı</label>
        <input type="file" name="image" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Ürün İçeriği</label>
        <textarea id="editor" class="form-control" name="content" rows="4"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Oluştur</button>
      </div>

    </form>
  </div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
    $('#editor').summernote(
      {'height':300}
    );
    });
</script>
@endsection
