@extends('layouts.mainlayout')

@section('title', 'Pengguna Terblokir')

@section('content')

<h2>List User Terblokir</h2>
<hr>
<div class="mt-5 d-flex justify-content-end">
  <a href="/users" class="btn btn-primary me-3">Kembali</a>
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
      <th scope="col">Telpon</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($bannedUsers as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{  $item->username }}</td>
      <td>
        @if ($item->phone)
        {{ $item->phone}}
        @else 
        -        
        @endif
      </td>
      <td>
        <a href="/user-restore/{{$item->slug}}">pulihkan</a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>
</div>
@endsection