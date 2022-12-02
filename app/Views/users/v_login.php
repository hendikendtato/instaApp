<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link href="img/logo/logo.png" rel="icon"> -->
  <title>Login</title>
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
                  <a href="index.html"><img src="<?= base_url('assets/images/logo/logo1.png') ?>" alt="Logo"></a>
              </div>
              <h1 class="auth-title">Log in.</h1>
              <form action="<?= base_url('/loginAuth'); ?>" method="POST">
                <div class="form-group position-relative has-icon-left mb-4">
                  <input type="email" class="form-control form-control-xl" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address">
                  <div class="form-control-icon">
                      <i class="bi bi-person"></i>
                  </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" class="form-control form-control-xl" name="password" id="exampleInputPassword" placeholder="Password">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
              </form>
              <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Belum mempunyai akun? <a href="<?= base_url('/register'); ?>" class="font-bold">Daftar</a>.</p>
              </div>
          </div>
      </div>
    </div>
  </div>
</body>


</html>