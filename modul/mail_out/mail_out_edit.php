<?php

    if( isset( $_REQUEST['submit'] )){
          $mail_in_id=$_REQUEST['mail_in_id'];
          $sent_at=$_REQUEST['sent_at'];
          $mail_code=$_REQUEST['mail_code'];
          $mail_date=$_REQUEST['mail_date'];
          $mail_to=$_REQUEST['mail_to'];
          $mail_type_id=$_REQUEST['mail_type_id'];
          $mail_subject=$_REQUEST['mail_subject'];
          $description=$_REQUEST['description'];
        $sql = mysqli_query($con, "UPDATE mail_out set sent_at='$sent_at', mail_code='$mail_code', mail_date='$mail_date',mail_to='$mail_to', mail_type_id='$mail_type_id', mail_subject='$mail_subject',description='$description' WHERE mail_out_id='$mail_out_id'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=mail_out';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $mail_out_id = $_REQUEST['mail_out_id'];

    $sql = mysqli_query($con, "SELECT * FROM mail_out WHERE mail_out_id='$mail_out_id'");
    while($row = mysqli_fetch_array($sql)){

?>
  <section class="content-header">
      <h1>
        Edit
        <small>Surat Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li><a href="#">Surat</a></li>
        <li><a href="#">Surat Keluar</a></li>
        <li class="active"><a href="#">Edit Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-12">
          <div class="box box-red">
            <div class="box-header with-border">
              <h3 class="box-title">Tipe Surat</h3>
            </div>
            <form role="form" method="post">
              <div class="box-body">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Id Surat Masuk</label>
                            <input type="number" class="form-control" name="mail_in_id" value="<?php echo $row['mail_out_id'] ?>" disabled="true">
                          </div>
                          <div class="form-group">
                            <label>Tanggal Datang</label>
                            <input name="incoming_at" type="date" class="form-control" value="<?php echo $row['sent_at'] ?>">                  
                          </div>
                          <div class="form-group">
                            <label>Kode Surat</label>
                            <input type="number" class="form-control" name="mail_code" value="<?php echo $row['mail_code'] ?>">
                          </div>
                          <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control" name="mail_date" value="<?php echo $row['mail_date'] ?>">
                          </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Surat Untuk</label>
                          <input type="text" class="form-control" name="mail_to" value="<?php echo $row['mail_to'] ?>">
                        </div> 
                        <div class="form-group">
                          <label>Subjek Surat</label>
                          <input type="text" class="form-control" name="mail_subject" value="<?php echo $row['mail_subject'] ?>">
                        </div> 
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <input type="text" class="form-control" name="description" value="<?php echo $row['description'] ?>">
                        </div> 
                        <div class="form-group">  
                          <label>Tipe Surat</label>               
                          <select name="mail_type_id" class="form-control" >
                            <option value="<?php echo $row['mail_out_id'] ?>"><?php echo $row['mail_out_id'] ?></option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM mail_type");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['mail_type_id'];?>">
                              <?php echo $row['type'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
                        </div>                  
                  </div>
                </div>
              

              <div class="box-footer">
                <a href="./index.php?page=mail_out" class="btn btn-warning">Kembali</a>
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
