@extends('layouts.mainlayout')

@section('title', 'Rent Log')

@section('content')

<h2>Riwayat Peminjaman</h2>
<hr>

<div class="mt-5">
   <x-rent-log-table :rentlog='$renlog'/>
</div>

@endsection