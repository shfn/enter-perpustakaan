@extends('layouts.mainlayout')

@section('title', 'Edit Buku')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h2>Edit Buku</h2>
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

  <form action="/book-edit/{{$book->slug}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="kode" class="form-label">Kode</label>
      <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Kode buku" value="{{ $book->book_code }}">
    </div>

    <div class="mb-3">
      <label for="judul" class="form-label">Judul</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Judul buku" value="{{ $book->title }}">
    </div>

    <div class="mb-3">
      <label for="gambar" class="form-label">Gambar</label>
      <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Cover buku" value="{{ $book->cover }}">
    </div>

    <div class="mb-3">
      <label for="curentGambar" class="form-label">Gambar saat ini</label>
      <div>
        @if ($book->cover!='')
          <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width=100px">
          @else
            <img src="{{asset('images/coverindex.png')}}" alt="">
        @endif
      </div>
    </div>
    
    <div class="mb-3">
      <label for="category" class="form-label">Kategori</label>
      <select name="categories[]" id="category" class="form-control select-multiple" multiple>
        @foreach ($categories as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="curentCategory" class="form-label">Kategori saat ini</label>
      <ul>
        @foreach ($book->categories as $category)
          <li>{{$category->name}}</li>
        @endforeach
      </ul>
    </div>
      
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>  

  </form>

</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select-multiple').select2();
});
</script>

@endsection