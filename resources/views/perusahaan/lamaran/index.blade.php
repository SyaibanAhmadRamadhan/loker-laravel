@extends('layouts.perusahaan')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">Data Apply pelamar</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Lowongan Kerja </th>
                            <th>Nama Pelamar</th>
                            <th>No Telpon</th>
                            <th>Jenis Kelamin</th>
                            <th>judul Lowongan</th>
                            <th>Tanggal Apply</th>
                            <th>Tanggal posting</th>
                            <th>kategori</th>

                            <th>Jadwal Interview</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tbody>
                            @foreach ($lamaran as $l)
                            <tr>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->user->nama_lengkap }}</td>
                                <td>{{ $l->user->no_telepon }}</td>
                                <td>{{ $l->user->jenis_kelamin }}</td>
                                <td>{{ $l->lowongan->judul }}</td>
                                <td>{{ $l->tgl_lamaran }}</td>
                                <td>{{ $l->lowongan->tanggal_posting }}</td>
                                <td>{{ $l->lowongan->id_kategori }}</td>
                                <td>{{ $l->tgl_interview }}</td>
                                <td>
                                    {{-- <a href="download_cv.php?filename={{ $l->user->cv }}" onclick="alert('belum selesai')">Download CV</a> --}}
                                    <form action="{{ url('/zip') }}" method="get">
                                        <input type="hidden" name="lowongan" value="{{ $l->lowongan->judul }}">
                                        <input type="hidden" name="perusahaan" value="{{ $l->lowongan->perusahaan->nama_perusahaan }}">
                                        <input type="hidden" name="user" value="{{ $l->user->username }}">
                                        <input type="hidden" name="download" value="{{ $l->document }}">
                                        <input type="submit" class="btn btn-primary" value="download here">
                                    </form>

                                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $l->id }}">Jadwal interview</a>


                                </td>


                            </tr>
                            <div class="modal fade" id="exampleModal{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">

                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Daftar
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="lg-frm form-valide" action="{{ route('lamaran.update',$l->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row has-success">
                                                    <label class="col-lg-4 col-form-label" for="tanggal_lahir">Tanggal Interview</label>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="tanggal_interview" class="form-control" id="tanggal_lahir" value="{{ $l->tgl_interview }}">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                </td>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>

            @endforeach

            </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
<!-- End of M

@endsection
