@extends('layouts.mainlayout')

@section('title', 'Hapus Kategori')

@section('content')

<h2>Apakah anda yakin akan menghapus kategori "{{$category->name}}"?</h2>

<div class="mt-5">
  <a href="/category-destroy/{{$category->slug}}" class="btn btn-danger me-4">Hapus</a>
  <a href="/categories" class="btn btn-primary">Batal </a>
</div>

@endsection