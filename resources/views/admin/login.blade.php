
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EducGard Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href=" {{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('diste/css/adminlte.min.css') }} ">
</head>
<style>
  .test{
    background-image: url('{{ asset('diste/img/mur.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
<body class="login-page test">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Educ</b>Gard</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez-vous pour commencer votre session</p>

      <form action=" {{ route('connect') }} " method="post">
        @csrf
        <div class="input-group mb-3">
        @if($errors->has('email'))
          <div class="alert alert-danger">
              {{ $errors->first('email') }}
          </div>
        @endif
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-success btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=" {{ asset('plugins/jquery/jquery.min.js') }} "></script>
<!-- Bootstrap 4 -->
<script src=" {{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- AdminLTE App -->
<script src=" {{ asset('diste/js/adminlte.min.js') }} "></script>
</body>
</html>
