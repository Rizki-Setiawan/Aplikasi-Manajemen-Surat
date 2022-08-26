  <section class="content-header">
      <h1>
        Tambah
        <small>Tipe Surat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li><a href="#">Tipe Surat</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tipe Surat</h3>
            </div>
            <form role="form" method="post" onsubmit="return validasi_input(this)">
              <div class="box-body">
                <div class="form-group">
                  <label>Id Tipe Surat</label>
                  <input type="number" class="form-control" name="mail_type_id" placeholder="Masukan Id Tipe Surat">
                </div>
                <div class="form-group">
                  <label>Tipe Surat</label>
                  <input type="text" class="form-control" name="type" placeholder="Masukan Tipe Surat">
                </div>
              </div>
              <div class="box-footer">
                <a href="./index.php?page=mail_type" class="btn btn-warning">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

<script type="text/javascript">
function validasi_input(form){
   if (form.type.value == ""){
    alert("Masukan Tipe Surat!");
    form.type.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $mail_type_id=$_REQUEST['mail_type_id'];
    $type=$_REQUEST['type'];
         
        $sql="INSERT INTO `mail_type`(`mail_type_id`,`type`)VALUES(null,'$type')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=mail_type';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>

  </div>
</section>

