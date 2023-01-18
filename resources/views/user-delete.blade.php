@extends('layouts.mainlayout')

@section('title', 'Blokir User')

@section('content')

<h2>Apakah anda yakin akan menghapus username "{{$user->username}}"?</h2>

<div class="mt-5">
  <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger me-4">Hapus</a>
  <a href="/users" class="btn btn-primary">Batal </a>
</div>

@endsection