@extends('back.layouts.master')
@section('title','Tüm Ürünler')

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Fotoğrafı</th>
            <th>Kategori id</th>
            <th>Kategori Adı</th>
            <th>Oluşturulma Tarihi</th>
            <th>Durum</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Fotoğrafı</th>
            <th>Kategori id</th>
            <th>Kategori Adı</th>
            <th>Oluşturulma Tarihi</th>
            <th>Durum</th>
          </tr>
        </tfoot>
        <tbody>

            @foreach($categories as $category)
            <tr>
              <td><img src="{{asset($category->photo)}}" width="100"></td>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->created_at->diffForHumans()}}</td>
              <td>{{$category->status}}</td>
              <td>
                <a href="#" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                <a href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection
