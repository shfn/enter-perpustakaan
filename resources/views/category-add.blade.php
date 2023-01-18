@extends('layouts.mainlayout')

@section('title', 'Tambah Kategori')

@section('content')

<h2>Tambah Kategori</h2>
<hr>
<div class="mt-5 w-50">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="category-add" method="post">
    @csrf
    <div>
      <label for="name" class="form-label">Nama</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Nama kategori">
    </div>

    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

  </form>

</div>


@endsection