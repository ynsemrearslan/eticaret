@extends('back.layouts.master')
@section('title','Şifre Değiştir')
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


    <form method="post" action="{{route('register.post')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Eski Şifre</label>
        <input type="password" name="old" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Yeni Şifre</label>
        <input type="password" name="new" class="form-control" required></input>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Değiştir</button>
      </div>

    </form>
  </div>
@endsection
