<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        /* justify-content: center; */
        align-items: center;
        padding-bottom: 20px
    }

    .btnUpload {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 8px 30px;
        border-radius: 8px;
        font-size: 20px;

        font-weight: bold;

    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        /* justify-content: center; */
        left: 0;
        top: 0;
        opacity: 0;
    }

</style>
@extends("layouts.main")

@section("container")
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <form action="/lamaran" method="POST" class="P10" enctype="multipart/form-data">



                    @csrf
                    <input type="hidden" name="id_lowongan_kerja" value="{{ $lowongan->id }}">
                    <table border="0" cellspacing="0" style="min-width: 120px;min-height: 300px;" class="table">
                        <tr>
                            <td colspan="3" class="text-center">{{ $lowongan->perusahaan->nama_perusahaan }} </td>
                        </tr>
                        <tr>

                            <td colspan="3" class="text-center"> {{ $lowongan->judul }} </td>
                        </tr>
                        <tr>
                            <td align="center"> Deskripsi </td>
                            <td>:</td>
                            <td>{{ $lowongan->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td align="center"> Kategori </td>
                            <td>:</td>
                            <td> {{ $lowongan->kategori->id }} </td>
                        </tr>
                        <tr>
                            <td align="center"> Kota </td>
                            <td>:</td>
                            <td>{{ $lowongan->kota->nama_kota }}</td>
                        </tr>
                        <tr>
                            <td align="center"> Batas Waktu </td>
                            <td>:</td>
                            <td>{{$lowongan->batas_waktu}}</td>
                        </tr>
                    </table>
                    <div class="text-center" role="group" aria-label="...">
                        <input type="button" data-toggle="modal" data-target="#lamar" class="btn btn-primary" name="simpan" value="Lamar Sekarang" id="lik">

                        <input type="button" class="btn btn-primary" value="Back" onclick="location.href='lowongan-kerja">
                        <div class="modal fade" id="lamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Upload Document Anda
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <div class='file_container'>
                                            <p style="clear:both;">
                                                <input type='file' name='document[]' style=" float:left;" class="file" multiple />
                                                <button type='button' style="float:right;margin:5px;" class='deleteFile btn btn-danger' title='Delete file'><span class='glyphicon glyphicon-remove'></span> Delete file</button>

                                                <span id="errorDoc" style="color: black;"></span>
                                            </p>
                                        </div> --}}
                                        <div class="example">
                                            <div class="upload-btn-wrapper">
                                                <button class="btnUpload" style="cursor: pointer;">Upload a file</button>

                                                {{-- <input type="file" name="myfile" /> --}}
                                                <input class="multi custom-file-input" name='document[]' accept="jpg|jpeg|png" data-maxsize="5120" data-maxfile="2048" type="file" id="T7" />


                                            </div>
                                            <div requred id="T7-list" style="border:#999 solid 3px; padding:15px; padding-bottom:50px">
                                                <p>Upload Your File</p>

                                                <br />
                                                <br />
                                            </div>
                                            <p style="text-align: left">*max size 2MB / 2048KB</p>
                                            <p style="text-align: left">*format file png, jpg, jpeg</p>

                                            <p style="clear:both; padding-top:30px">
                                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
            <!--/.service-single-->
        </div>
        <!--/.col-->

    </div>
    <!--/.col-->
</div>
<!--/.row-->
</div>
<!--/.service-content-one-->
@endsection
