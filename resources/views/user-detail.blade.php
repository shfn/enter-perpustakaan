@extends('layouts.mainlayout')

@section('title', 'Detail Pengguna')

@section('content')

<h2>Detail User</h2>
<hr>
<div class="mt-5 d-flex justify-content-end">
  @if ($user->status == 'inactive')
  <a href="/user-approve/{{$user->slug}}" class="btn btn-primary me-3">Aktifkan User</a>
  @endif
  <a href="/users" class="btn btn-primary me-3">Kembali</a>
</div>

<div class="mt-3">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
</div>

<div class="my-3 w-25">

  <div class="mb-3">
    <label for=""class="form-label">Username</label>
    <input type="text" class="form-control" readonly value="{{$user->username}}">
  </div>

  <div class="mb-3">
    <label for=""class="form-label">No Telepon</label>
    <input type="text" class="form-control" readonly value="{{$user->phone}}">
  </div>

  <div class="mb-3">
    <label for=""class="form-label">Alamat</label>
    <textarea name="" id="" cols="30" rows="3" class="form-control" style="resize: none;">{{$user->address}}</textarea>
  </div>

  <div class="mb-3">
    <label for=""class="form-label">Status</label>
    <input type="text" class="form-control" readonly value="{{$user->status}}">
  </div>

</div>

<div class="mt-5">
  <h3>Riwayat Peminjaman</h3>
  <hr>
   <x-rent-log-table :rentlog='$renlog'/>
</div>
@endsection