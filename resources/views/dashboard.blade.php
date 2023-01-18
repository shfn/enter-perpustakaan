@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<h1>Selamat datang {{Auth::user()->username}}</h1>

<div class="row mt-5">
  <div class="col-lg-4">
    <div class="card-data bg-info">
      <div class="row">
        <div class="col-6"><i class="bi bi-book"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
          <div class="card-desc">Buku</div>
          <div class="card-count">{{$book_count}}</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card-data bg-info">
      <div class="row">
        <div class="col-6"><i class="bi bi-card-list"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
          <div class="card-desc">Kategori</div>
          <div class="card-count">{{$category_count}}</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card-data bg-info">
      <div class="row">
        <div class="col-6"><i class="bi bi-people"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
          <div class="card-desc">Pengguna</div>
          <div class="card-count">{{$user_count}}</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-5">
  <h2>#Rent Log</h2>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">User</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">Rent Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Actual Return Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td colspan="7" style="text-align:center">No Date</td>
    </tr>
  </tbody>
</table>

</div>

@endsection