@extends('back.layouts.master')
@section('title','Admin kullanıcısı oluştur')
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


    <form method="post" action="{{route('admin.create')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Kullancı Adı</label>
        <input type="text" name="name" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Şifre</label>
        <input type="password" name="mail" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="mail" class="form-control" required></input>
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
        <label>Yetki</label>
        <select class="form-control" name="role" required>
          <option value="">Seçim Yapınız</option>
            <option value="1">Görüntüleme</option>
            <option value="0">Görüntüleme ve değiştirme</option>
        </select>
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
