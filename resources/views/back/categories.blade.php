@extends('back.layouts.master')
@section('title','Kategori Oluştur')
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

    <form method="post" action="{{route('categories.create')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Kategori Adı</label>
        <input type="text" name="name" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Katgori Fotoğrafı</label>
        <input type="file" name="image" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Durum</label>
        <select class="form-control" name="status" required>
          <option value="">Seçim Yapınız</option>
            <option value="1">Aktif</option>
            <option value="0">Pasif</option>
        </select>
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
