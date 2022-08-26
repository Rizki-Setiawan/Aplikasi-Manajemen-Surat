<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AplikasiSurat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bootstrap/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bootstrap/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="assets/bootstrap/css/animate.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" 
    style="
    height: 100%;
    width: 100%;
    background: url('assets/dist/img/profile_bg.png') no-repeat;
    background-size: cover;">

    <?php
      require('db.php');
      session_start();
      if (isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $data = mysqli_fetch_array($result);
        if($rows==1){
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['level'] = $data['level'];
            if ($data['level']=="admin") {
              header("Location: index.php?page=dashboard");
            }elseif ($data['level']=="user") {
              header("Location: index_user.php?page=dashboard");
            }else{
              echo "error";
            }
            
        }
          else
        {
           echo "<script language='javascript' type='text/javascript'>
           alert('Login Gagal, Silahkan Ulangi Kembali!');
           document.location='login.php';
           </script>";
        }
        }
          else
            {
        ?>

<div class="login-box animated fadeInDown">
  <div class="login-logo">
    <a href="index.php"><b>Aplikasi</b>Surat</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Pengarsipan Surat Masuk Dan Keluar</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <center>
        <div class="col-xs-12">
          <br><button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button><br>
        </div>
      </center>
        <!-- /.col -->
      </d
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

 <?php } ?>

</body>
</html>
