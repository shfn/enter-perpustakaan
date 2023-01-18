<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> @yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>

<div class="main d-flex flex-column justify-content-between">

  <nav class="navbar navbar-dark navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ENTER PERPUSTAKAAN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<div class="body-content h-100">
  <div class="row g-0 h-100">
    <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">

      @if (Auth::user())

        @if (Auth::user()->role_id == 1)
        <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif > Dashboard</a>
        <a href="/books" @if (request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-edit/{slug}' || request()->route()->uri == 'book-delete/{slug}' || request()->route()->uri == 'book-deleted' ) class="active" @endif> Buku</a>

        <a href="/categories" @if (request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-delete/{slug}' ) class="active" @endif> Kategori</a>

        <a href="/users" @if (request()->route()->uri == 'users' || request()->route()->uri == 'registered-users' || request()->route()->uri == 'user-detail' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'user-ban/{slug}' || request()->route()->uri == 'user-banned') class="active" @endif> Pengguna</a>

        <a href="/book-rent" @if (request()->route()->uri == 'book-rent') class="active" @endif> Peminjaman Buku</a>
       
        <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs') class="active" @endif> Log Peminjaman</a>
        
        <a href="/book-return" @if (request()->route()->uri == 'book-return') class="active" @endif> Pengembalian Buku</a>
        
        <a href="/" @if (request()->route()->uri == '/') class="active" @endif> List Buku</a>
        <a href="/logout"> Logout</a>
        @else
        <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif> Profile</a>
        <a href="/" @if (request()->route()->uri == '/') class="active" @endif> Buku</a>
        <a href="/news"> Berita</a>
        <a href="/logout"> Logout</a>
        @endif
        
        @else
        <a href="/login"> Login</a>


      @endif

    </div>
      <div class="content p-5 col-lg-10">
        @yield('content')
      </div>
    </div>
  </div>
</div>

</div>




























  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>