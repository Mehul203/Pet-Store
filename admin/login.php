<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page dark-mode">
  <script>
    start_loader()
  </script>
  
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary shadow-lg custom-card-bg" style="border-radius: 10px;">
    <div class="card-header text-center">
      <a href="./" class="h1 text-uppercase"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg mb-4 text-muted">Sign in to start your session</p>

      <form id="login-frm" action="" method="post">
        <div class="input-group mb-4">
          <input type="text" class="form-control form-control-lg rounded-3" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <input type="password" class="form-control form-control-lg rounded-3" name="password" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            <button type="button" class="btn btn-link" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); border: none; background: none;">
              <span id="password-icon" class="fas fa-eye"></span>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?php echo base_url ?>" class="text-muted">Go to Website</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block rounded-3">Sign In</button>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();

    // Toggle password visibility
    $('#togglePassword').click(function() {
      var passwordField = $('#password');
      var passwordIcon = $('#password-icon');

      if (passwordField.attr('type') === 'password') {
        passwordField.attr('type', 'text');
        passwordIcon.removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        passwordField.attr('type', 'password');
        passwordIcon.removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  })
</script>

</body>
</html>


