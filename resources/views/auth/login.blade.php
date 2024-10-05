<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in | Hexaware</title>

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
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">Hexaware</a>
    </div>
    <div class="card-body">
      <!--<p class="login-box-msg">Sign in to start your session</p>-->
      <!-- Error message placeholder -->
      <div id="error-message" class="alert alert-danger" style="display: none;">
        Invalid username or password. Please try again.
      </div>
      <form action="{{ url('/login') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="usernameEmailInput">Email</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="usernameEmailInput" placeholder="Enter your email" name="email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        </div>
      
        <div class="form-group">
          <label for="passwordInput">Password</label>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="passwordInput" placeholder="Enter your password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>

        <p class="mb-1">
          <a href="/forgot-password">I forgot my password</a>
        </p><br>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          
          <!-- /.col -->
        </div>
        @error('message')
        <p class="login-box-msg text-center"><h6 class="text-center"><b>{{ $message }}</b></h6> </p>
        @enderror
      </form><br>

      <!--<div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>-->
      <!-- /.social-auth-links -->

      <!--<p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>-->
      <p class="mb-0 text-center">
        New Member? <a href="/signup" class="text-center">Register</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
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
