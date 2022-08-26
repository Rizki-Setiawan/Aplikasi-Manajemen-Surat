<?php
if( isset($_REQUEST['page'] )){

  $page = $_REQUEST['page'];

  switch( $page ){
    case 'dashboard':
      include "modul/dashboard/dashboard.php";
      break;
    case 'mail_type':
      include "modul/mail_type/mail_type.php";
      break;
    case 'mail_in':
      include "modul/mail_in/mail_in.php";
      break;
    case 'mail_out':
      include "modul/mail_out/mail_out.php";
      break;
    case 'disposition':
      include "modul/disposition/disposition.php";
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
