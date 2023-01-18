@extends('layouts.mainlayout')

@section('title', 'Daftar Buku')

@section('content')

<h2>List Buku</h2>
<hr>
<div class="mt-4 d-flex justify-content-end">
  <a href="book-add" class="btn btn-outline-primary btn-sm me-3">Tambah Buku</a>
  <a href="book-deleted" class="btn btn-outline-info btn-sm">Lihat Data Terhapus</a>
</div>

<div class="mt-5">
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
      <th scope="col">Kode</th>
      <th scope="col">Judul</th>
      <th scope="col">Kategori</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{  $item->book_code }}</td>
      <td>{{  $item->title }}</td>
      <td>
        @foreach ($item->categories as $category)
          {{  $category->name }} <br>
        @endforeach
      </td>
      <td>{{  $item->status }}</td>
      <td>
        <a href="/book-edit/{{$item->slug}}">edit</a>
        <a href="/book-delete/{{$item->slug}}">hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection