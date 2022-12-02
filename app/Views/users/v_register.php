<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>instaApp - Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">

  <link href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/pages/auth.css') ?>">

</head>

<body>
    <div id="auth">
        <div class="row h-10 d-flex justify-content-center">
            <div class="col-md-8">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <form action="<?= base_url('/save_register'); ?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Masukkan nama lengkap" name="full_name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Masukkan email" name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Masukkan username" name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="password" class="form-control form-control-xl" id="inputPassword" placeholder="Password" name="password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="password" class="form-control form-control-xl" id="repeatPassword" placeholder="Confirm Password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah mempunyai akun? <a href="<?= base_url('/'); ?>"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?= base_url('assets/vendors/jquery/jquery.min.js') ?>"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        $("#repeatPassword").keyup(function (){
            var pass = document.getElementById("inputPassword");
            var confirm = document.getElementById("repeatPassword");

            if(confirm.value == pass.value){
                $("input[id='repeatPassword']").removeClass("is-invalid");
                $("input[id='repeatPassword']").addClass("is-valid");
            } else {
                $("input[id='repeatPassword']").addClass("is-invalid");
            }
        });
    </script>
</body>

</html>