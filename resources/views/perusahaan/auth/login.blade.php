<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login-Perusahaan</title>

    <!-- Custom fonts for this template-->
    <link href="/perusahaan/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/perusahaan/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Perusahaan</h1>
                                        @if (session()->has("success"))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session("success") }}
                                        </div>
                                        @endif
                                        @if (session()->has("error"))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session("error") }}
                                        </div>
                                        @endif
                                    </div>

                                    <form class="user form-login" method="post" action="/perusahaan/login">

                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">

                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <!--  <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="{{ url('perusahaan/register') }}">Daftar Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="/perusahaan/vendor/jquery/jquery.min.js"></script>
    <script src="/perusahaan/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/perusahaan/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/perusahaan/js/sb-admin-2.min.js"></script>

    {{-- validasi --}}
    <script src="/validation/jquery.validate.min.js"></script>
    <script>
        jQuery(".form-login").validate({
            ignore: []
            , errorClass: "invalid-feedback animated fadeInDown"
            , errorPlacement: function(e, a) {
                jQuery(a).parents(".form-group").append(e);
            }
            , highlight: function(e) {
                jQuery(e)
                    .closest(".form-group")
                    .removeClass("is-invalid")
                    .addClass("is-invalid");
            }
            , success: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid")
                    , jQuery(e).remove();
            }
            , rules: {
                email: {
                    required: !0
                    , email: !0
                , }
                , password: {
                    required: !0
                , }
            , }
            , messages: {
                email: {
                    email: "Masukan Alamat Email Dengan Benar"
                    , required: "Masukan Email"
                , }
                , password: {
                    required: "Masukan Password"
                , }
            , }
        , });

    </script>


</body>

</html>
