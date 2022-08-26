<?php
if( isset($_REQUEST['page'] )){

  $page = $_REQUEST['page'];

  switch( $page ){
    case 'dashboard':
      include "modul/dashboard_user/dashboard.php";
      break;
    case 'mail_in':
      include "modul/mail_in_user/mail_in.php";
      break;
    case 'mail_out':
      include "modul/mail_out_user/mail_out.php";
      break;
    case 'disposition':
      include "modul/disposition_user/disposition.php";
      break;
  }
} else {
?>
    <div class="jumbotron">
      <h2>Page Not Found</h2>
    </div>
<?php
}


?>
