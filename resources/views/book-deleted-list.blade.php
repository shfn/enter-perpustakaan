@extends('layouts.mainlayout')

@section('title', 'Buku Terhapus')

@section('content')

<h2>List Buku Terhapus</h2>
<hr>
<div class="mt-5 d-flex justify-content-end">
  <a href="/books" class="btn btn-primary">Kembali</a>
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
      <th scope="col">Kode</th>
      <th scope="col">Judul</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($deletedBooks as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{  $item->book_code }}</td>
      <td>{{  $item->title }}</td>
      <td>
        <a href="/book-restore/{{$item->slug}}">Pulihkan</a>
        {{-- <a href="/category-delete/{{$item->slug}}">hapus</a> --}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection