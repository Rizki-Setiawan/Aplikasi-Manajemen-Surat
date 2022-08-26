<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Daftar | Aplikasi Surat</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="assets/css/icon.css" rel="stylesheet">  
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">     
        <link rel="shortcut icon" href="assets/images/icon.ico">  

          
        <!-- Theme Styles -->
        <link href="assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body style="
    height: 100%;
    width: 100%;
    background: url('assets/images/profile_bg.png') no-repeat;
    background-size: cover;">
                    <center class="animated fadeInDown" style="padding-top: 30px;"><h3>Aplikasi Surat</h3>
                    Pengarsipan Surat Masuk Dan Keluar </center>
                      <div class="row animated fadeInLeft" style="padding-top: 20px;">
                          <div class="col s12 m6 l4 offset-l4 offset-m3">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Daftar</span>
                                       <div class="row">
                                           <form class="col s12" method="post">
                                               <div class="input-field col s11">
                                                   <input id="username" type="text" name="username">
                                                   <label for="username">Username</label>
                                              </div><i class="material-icons" style="padding-top: 25px;">perm_identity</i><br><br>
                                              <div class="input-field col s11">
                                                   <input id="password" type="password" name="password">
                                                   <label for="password">Password</label>
                                              </div><i class="material-icons" style="padding-top: 30px;">vpn_key</i><br>
                                               <div class="input-field col s11">
                                                   <input id="fullname" type="text" name="fullname">
                                                   <label for="fullname">Fullname</label>
                                              </div><i class="material-icons" style="padding-top: 40px;">picture_in_picture</i><br>
                                              <div class="col s12 right-align m-t-sm">
                                                   <a href="login.php" class="waves-effect waves-light orange btn">Masuk</a>
                                                   <button type="submit" class="waves-effect waves-light blue btn">Daftar</button>
                                               </div>
                                           </form>
                                      </div>
                                  </div>
                              </div>
                              <center>Copyright &copy; <a class="waves-effect waves-light text modal-trigger" href="#tentang"> Rizki Setiawan </a> 2018 </center> 
                          </div>
                    </div>

            <!-- Modal Structure -->
            <div id="tentang" class="modal">
                 <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tentang</h4>
      </div>
      <div class="modal-body">
      HRMS (Human Resource Management System) Merupakan Aplikasi Management Karyawan Berbasis Web, Aplikasi Ini Masih dalam Pengembangan
      Untuk info bisa menghubungi Hakko Bio Richard di :
     <table >
      <tr>
      <td>No Telepon</td> 
      <td>:</td> 
      <td style="color: #2386C0;">0856 949 848 03</td>
      </tr>
      <br />
      <tr>
      <td>E-mail</td>
      <td>:</td> 
      <td style="color: #2386C0;">rzsetiawan17@gmail.com</td>
      </tr> 
      <br />
      <tr>
      <td>Facebook</td>       
      <td>:</td> 
      <td style="color: #2386C0;">Rizki Setiawan</td>
      </tr>
      <br />
      <tr>
      <td>Instagram</td>    
      <td>:</td> 
      <td style="color: #2386C0;"> rzsetiawan17</td>
      </tr>
       </table>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn teal">Ok</a>
    </div>
    </div>
               
            </div>



    <?php

require_once 'db.php';
if($_POST){
$username = $_POST ['username'];
$password = $_POST ['password'];
$fullname = $_POST ['fullname'];


if($username =='' || $password =='' || $fullname == '' ){
    ?>
   <script language="javascript" type="text/javascript">
                     alert("Maaf! field tidak boleh ada yang kosong.");
                     document.location='daftar.php';
                    </script>"   ;<?php
} else {
    
    $sql = "INSERT INTO `user_rs_23` (`username`, `password`, `fullname`, `level`) VALUES ('$username', md5('$password'), '$fullname', 'admin');";


    if($con->query($sql) === TRUE) {
        ?>
        <script language="javascript" type="text/javascript">
                     alert("Selamat! data berhasil di input. Anda Harus Login Dulu!");
                     document.location='login.php';
                    </script>"   ;
        <?php
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
  }
}


?>
     

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
    </body>
</html>