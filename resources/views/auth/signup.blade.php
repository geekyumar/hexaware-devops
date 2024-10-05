<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration | Hexaware</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
      <!-- /.register-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">Hexaware</a>
    </div>
    <div class="card-body">
      <!--<p class="login-box-msg">Register a new membership</p>-->
      <!-- <div id="error-message" class="alert alert-danger" style="display :none;"> -->

      <form action="{{url('/register') }}" method="post">
        @csrf

        <div class="form-group">
          <label for="fullNameInput">Full Name</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="fullNameInput" placeholder="Full name" name="name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>
      
      
        <div class="form-group">
          <label for="emailInput">Email</label>
          <div class="input-group mb-3">
            <input type="email" class="form-control" id="emailInput" placeholder="Email" name="email" required>
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
            <input type="password" class="form-control" id="passwordInput" placeholder="Enter your password" name="password" required minlength="8">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="confirmPasswordInput">Confirm Password</label>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="confirmPasswordInput" placeholder="Re-enter your password" name="confirmPassword" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group pb-3">
          <label>Role</label>
                  <select class="select2" name="role" style="width: 100%;">
                    <option disabled selected>Select Role</option>
                    <option>Admin</option>
                    <option>HR Manager</option>
                    <option>Recruiter</option>
                    <option>Interviewer</option>
                    <option>Candidate</option>
                  </select>
        </div>
        
        <!--<div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>-->
          <!-- /.col -->
         
            <div class="col-7 mx-auto">
              <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>
            @error('message')
        <p class="login-box-msg text-center"><h6 class="text-center"><b>{{ $message }}</b></h6> </p>
        @enderror
        
          <!-- </form> -->
          <!-- /.col -->
          <div class="col-7 mx-auto text-center mt-3">
            <a href="{{ url('/login') }}" class="btn btn-link">Back to Login</a>
          </div>
        
        </div>
      </form>

      <!--<div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>-->

      <!--<a href="login.html" class="text-center">I already have a membership</a>-->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
