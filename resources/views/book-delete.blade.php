@extends('layouts.mainlayout')

@section('title', 'Hapus Buku')

@section('content')

<h2>Apakah anda yakin akan menghapus buku "{{$book->title}}"?</h2>

<div class="mt-5">
  <a href="/book-destroy/{{$book->slug}}" class="btn btn-danger me-4">Hapus</a>
  <a href="/books" class="btn btn-primary">Batal </a>
</div>

@endsection