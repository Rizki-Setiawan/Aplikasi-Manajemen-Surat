<?php

    if( isset( $_REQUEST['submit'] )){
        $mail_type_id =$_REQUEST['mail_type_id'];
        $type = $_REQUEST['type'];


        $sql = mysqli_query($con, "UPDATE mail_type SET mail_type_id='$mail_type_id',type='$type' WHERE mail_type_id='$mail_type_id'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=mail_type';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $mail_type_id = $_REQUEST['mail_type_id'];

    $sql = mysqli_query($con, "SELECT * FROM mail_type WHERE mail_type_id='$mail_type_id'");
    while($row = mysqli_fetch_array($sql)){

?>
  <section class="content-header">
      <h1>
        Edit
        <small>Tipe Surat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li><a href="#">Tipe Surat</a></li>
        <li class="active"><a href="#">Edit Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tipe Surat</h3>
            </div>
            <form role="form" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label>Id Tipe Surat</label>
                  <input type="number" class="form-control" name="mail_type_id" value="<?php echo $row['mail_type_id'] ?>" disabled="true">
                </div>
                <div class="form-group">
                  <label>Tipe Surat</label>
                  <input type="text" class="form-control" name="type" value="<?php echo $row['type'] ?>">
                </div>
              </div>
              <div class="box-footer">
                <a href="./index.php?page=mail_type" class="btn btn-warning">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>
<?php
    }
}
?>

    </div>
    </section>
