<?php 
session_start();
include "include/dbconfig.php";
include "../utils/functions.php";
if(isset($_POST['submit'])){
    extract($_POST);
    $msg = "" ;
    $userId   = mysqli_real_escape_string($conn, $userId);
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "SELECT * FROM `users` WHERE BINARY `user_id`= '$userId' AND BINARY `password` = '$password' AND `role_id`='2'" ;
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
       
        $user                          = mysqli_fetch_assoc($res) ;
        $institute                     = getInstitutesById($user['org_id']);
        $_SESSION['institute_id']      = $user['org_id'];
        $_SESSION['institute_user_id'] = $userId;
        $_SESSION['institute_code']    = $institute['institute_code'];
       
        header('location: index.php');
    }else{
        $msg =  "<p class='text-danger'>Wrong user id or password.</p>" ;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Institute | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../files/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../files/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../files/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b>Institute</b> Login
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="userId" value="<?php if(isset($_POST['userId'])){ echo $_POST['userId'];} ?>" class="form-control" placeholder="User Id">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"  name="password"  class="form-control" placeholder="Password">
         
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            <?php echo isset($msg) ? $msg : "" ;?>
            </div> 
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../files/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../files/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../files/dist/js/adminlte.min.js"></script>
</body>
</html>
