@extends('layouts.mainlayout')

@section('title', 'Kategori')

@section('content')

<h2>List Kategori</h2>
<hr>
<div class="mt-5 d-flex justify-content-end">
  <a href="category-add" class="btn btn-primary me-3">Tambah kategori</a>
  <a href="category-deleted" class="btn btn-outline-info btn-sm">Lihat Data Terhapus</a>
</div>

<div class="mt-3">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
</div>

<div class="my-3">

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{  $item->name }}</td>
      <td>
        <a href="category-edit/{{$item->slug}}">edit</a>
        <a href="/category-delete/{{$item->slug}}">hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection