@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')

<div class="">
  <h3>Riwayat Peminjaman</h3>
  <hr>
   <x-rent-log-table :rentlog='$renlog'/>
</div>

@endsection