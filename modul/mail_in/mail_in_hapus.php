<?php


if(isset($_REQUEST['submit'])){

    $mail_in_id = $_REQUEST['mail_in_id'];

    $sql = mysqli_query($con, "DELETE FROM mail_in WHERE mail_in_id='$mail_in_id'");
    if($sql == true){
    	?>
     <script type="text/javascript">
	document.location='./index.php?page=mail_in';
	</script>
	<?php
        die();
    }
}
?>

