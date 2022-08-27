@extends('layouts.perusahaan')

@section('container')
@if (session()->has("success"))
<script>
    alert("Selamat Anda Berhasil Login")

</script>
@endif

<h2>Selamat Datang</h2>
<h2>{{ session("nama_perusahaan") }}</h2>
<h2>Status : {{ session("status") }}</h2>

@endsection
