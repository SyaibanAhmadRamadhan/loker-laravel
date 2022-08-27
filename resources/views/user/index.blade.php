@extends('layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row" style="justify-content: center !important; display: flex; margin-top: 2rem;">
        <div class="col">
            <div style="text-align: center; margin-bottom: 2rem">
                <img src="{{ asset('storage/' . auth()->user()->foto) }}" style="border-radius: 50%; height: 15rem; width: 15rem; " alt="tidak ada poto">

            </div>
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Username</td>
                    <td>{{ auth()->user()->username }}</td>
                </tr>
                <tr>
                <tr>
                    <td>Email</td>

                    <td>{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>

                    <td>{{ auth()->user()->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>

                    <td>{{ auth()->user()->alamat }}</td>
                </tr>
                <tr>
                    <td>No Telepon</td>

                    <td>{{ auth()->user()->no_telepon }}</td>
                </tr>
                <tr>
                    <td>Jeni Kelamin</td>
                    <td>{{ auth()->user()->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ auth()->user()->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>

                    <td>{{ auth()->user()->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tamatan Pendidikan</td>

                    <td>{{ auth()->user()->tamatan_pendidikan }}</td>
                </tr>
                <tr>
                    <td>Keahlian</td>

                    <td>{{ auth()->user()->keahlian }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <a type="button" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal{{ auth()->user()->id }}">EDIT YOUR DATA</a>

                    </td>
                </tr>

            </table><br><br>
            <br>
            <br>
            <div class="modal fade bs-example-modal-lg" id="exampleModal{{ auth()->user()->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-xl" role="document">

                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                    EDIT PROFILE
                                </span>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <form class="lg-frm" action="{{ route('user.update',auth()->user()->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="foto_old" value="{{ auth()->user()->foto }}">
                                <div class="form-group row has-success">
                                    <label for="username" class="col-lg-4 col-form-label">Username</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="username" class="form-control" id="usernameProfile" value="{{ auth()->user()->username }}" placeholder="Enter Your Username">


                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="email" class="col-lg-4 col-form-label">Email</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="email" class="form-control" id="emailProfile" value="{{ auth()->user()->email }}" placeholder="Enter Email">


                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="nama_lengkap" class="col-lg-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkapProfile" value="{{ auth()->user()->nama_lengkap }}" placeholder="Enter Nama Lengkap">


                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="alamat" class="col-lg-4 col-form-label">Alamat</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="alamat" class="form-control" id="alamatProfile" value="{{ auth()->user()->alamat }}" placeholder="Enter Nama Lengkap">


                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="no_telepon" class="col-lg-4 col-form-label">No Telepon</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="no_telepon" class="form-control" id="no_teleponProfile" value="{{ auth()->user()->no_telepon }}" placeholder="Enter No Telepon">


                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label class="col-lg-4 col-form-label">Jenis Kelamin</label>

                                    <div class="col-lg-6">
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="jenis_kelamin" value="laki-laki" {{ auth()->user()->jenis_kelamin == 'laki-laki' ? 'checked' : '' }} <span class="form-radio-sign"> Laki-laki</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="jenis_kelamin" value="perempuan" {{ auth()->user()->jenis_kelamin == 'perempuan' ? 'checked' : '' }} <span class="form-radio-sign"> perempuan</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row has-success">
                                    <label class="col-lg-4 col-form-label" for="tempat_lahir">Tempat Lahir</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahirProfile" value="{{ auth()->user()->tempat_lahir }}" placeholder="Enter Tempat Lahir">

                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label class="col-lg-4 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                    <div class="col-lg-6">
                                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ auth()->user()->tanggal_lahir }}" id="tanggal_lahirProfile">



                                    </div>
                                </div>

                                <div class="form-group row has-success">
                                    <label for="tamatan_pendidikan" class="col-lg-4 col-form-label">Tamatan
                                        Pendidikan</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="tamatan_pendidikan" class="form-control" value="{{ auth()->user()->tamatan_pendidikan }}" id="tamatan_pendidikanProfile" placeholder="Enter Tamatan Pendidikan">



                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="keahlian" class="col-lg-4 col-form-label">Keahlian</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="keahlian" class="form-control" value="{{ auth()->user()->keahlian }}" id="keahlianProfile" placeholder="Enter Keahlian">


                                    </div>
                                </div>

                                <div class="form-group row has-success">
                                    <label class="col-lg-4 col-form-label" for="foto">Foto</label>
                                    <div class="col-lg-6">
                                        @if (auth()->user()->foto)
                                        <img src="{{ asset('storage/'.auth()->user()->foto) }}" class="img-show1 mb-3 img-fluid rounded d-block" style="height: 200px" alt=""><br><br>

                                        @else
                                        <img class="img-show mb-3 img-fluid rounded d-block" style="height: 200px" alt=""><br>
                                        @endif

                                        <input type="file" name="foto" class="form-control-file" id="foto1" onchange="previewImage1()">
                                        <span id="err" style="color: black;"></span>
                                    </div>
                                </div>
                                <button type="submit" id="btnSubmitProfile" class="btn btn-primary">Submit</button>
                                </td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
