@extends('layouts.mainlayout')

@section('title', 'Kategori Terhapus')

@section('content')

<h2>List Kategori Terhapus</h2>

<div class="mt-4 d-flex justify-content-end">
  <a href="/categories" class="btn btn-primary">Kembali</a>
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
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($deletedCategories as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{  $item->name }}</td>
      <td>
        <a href="category-restore/{{$item->slug}}">Pulihkan</a>
        {{-- <a href="/category-delete/{{$item->slug}}">hapus</a> --}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection