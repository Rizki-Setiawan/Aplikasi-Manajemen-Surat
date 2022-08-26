<?php


if(isset($_REQUEST['submit'])){

    $mail_type_id = $_REQUEST['mail_type_id'];

    $sql = mysqli_query($con, "DELETE FROM mail_type WHERE mail_type_id='$mail_type_id'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=mail_type';
	</script>
	<?php
        die();
    }
}
?>

