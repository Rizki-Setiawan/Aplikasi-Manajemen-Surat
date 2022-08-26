<?php


if(isset($_REQUEST['submit'])){

    $dispo_id = $_REQUEST['dispo_id'];

    $sql = mysqli_query($con, "DELETE FROM disposition WHERE dispo_id='$dispo_id'");
    if($sql == true){
    	?>
     <script type="text/javascript">
	document.location='./index.php?page=disposition';
	</script>
	<?php
        die();
    }
}
?>

