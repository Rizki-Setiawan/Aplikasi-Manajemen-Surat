<?php


if(isset($_REQUEST['submit'])){

    $mail_out_id = $_REQUEST['mail_out_id'];

    $sql = mysqli_query($con, "DELETE FROM mail_out WHERE mail_out_id='$mail_out_id'");
    if($sql == true){
    	?>
     <script type="text/javascript">
	document.location='./index.php?page=mail_out';
	</script>
	<?php
        die();
    }
}
?>

