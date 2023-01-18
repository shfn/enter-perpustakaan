@extends('layouts.mainlayout')

@section('title', 'Pengguna')

@section('content')

<h2>List User</h2>
<hr>
<div class="mt-5 d-flex justify-content-end">
  <a href="/registered-users" class="btn btn-primary me-3">User belum teraktivasi</a>
  <a href="/user-banned" class="btn btn-outline-info btn-sm">User terblokir</a>
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
    @foreach ($users as $item)
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
        <a href="/user-detail/{{$item->slug}}">detail</a>
        <a href="/user-ban/{{$item->slug}}">blokir</a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>
</div>
@endsection