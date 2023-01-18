@extends('layouts.mainlayout')

@section('title', 'Daftar Buku')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="col-12 col-lg-6 col-md-8 offset-md-2 offset-md-3">
  <h2 class="mb-3">Pengembalian Buku</h2>
  <hr>

   <div class="mt-3">
    @if (session('message'))
      <div class="alert {{session('alert-class')}}">
          {{ session('message') }}
      </div>
    @endif
  </div>

  <form action="book-return" method="post">
    @csrf
    <div class="mb-3">
      <label for="user" class="form-label">User</label>
      <select name="user_id" id="user" class="form-control inputbox">
        <option value="">Pilih User</option>
        @foreach ($users as $item)
          <option value="{{$item->id}}">{{$item->username}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="book" class="form-label">Buku</label>
      <select name="book_id" id="book" class="form-control inputbox">
        <option value="">Pilih Buku</option>
        @foreach ($books as $item)
          <option value="{{$item->id}}">{{$item->book_code}} {{$item->title}}</option>
        @endforeach
      </select>
    </div>

    <div>
      <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </div>

  </form>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.inputbox').select2();
});
</script>

@endsection