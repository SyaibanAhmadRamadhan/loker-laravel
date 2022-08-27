<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">

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
                                    @if (session()->has("error"))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session("error") }}
                                    </div>

                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                                    </div>

                                    <form class="user form-login" method="post" action="/admin/login">

                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required name="password" class="form-control form-control-user" id="password" placeholder="Password">

                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/admin/js/sb-admin-2.min.js"></script>
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
