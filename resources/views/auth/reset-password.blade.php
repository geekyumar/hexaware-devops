<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password - {{ $email }} </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h4"><b>Change your password</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Enter a new password to change your password for your account <b>{{ $email }}.</b></p>
      <form action="/password_reset" method="post">
        @csrf
        <input name="reset_id" value="{{ request('reset_id') }}" class="form-control" hidden>
        <div class="form-group">
          <label for="new-password">New Password</label>
          <div class="input-group mb-3">
            <input type="password" id="new-password" name="password" class="form-control" placeholder="Enter your new password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="confirm-password">Confirm Password</label>
          <div class="input-group mb-3">
            <input type="password" id="confirm-password" name="confirm_password" class="form-control" placeholder="Re-enter your new password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Reset password</button>
          </div>
          <!-- /.col -->
        </div>

        @error('message')
        <p class="login-box-msg text-center"><h6 class="text-center"><b>{{ $message }}</b></h6> </p>
        @enderror

      </form>

      <!--<p class="mt-3 mb-1">
        <a href="login.html">Login</a>
      </p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
