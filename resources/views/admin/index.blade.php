@extends('layouts.admin')

@section('container')
@if (session()->has("success"))
<script>
    alert("Selamat Anda Berhasil Login")

</script>
@endif

<h2>Selamat Datang Di Halaman Admin</h2>

@endsection
