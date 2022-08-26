  <section class="content-header">
      <h1>
        Tambah
        <small>Disposisi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li><a href="#">Disposisi</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Disposisi</h3>
            </div>
            <form role="form" method="post" onsubmit="return validasi_input(this)">
            <div class="box-body">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Id Disposisi</label>
                            <input type="number" class="form-control" name="dispo_id" placeholder="Masukan Id Disposisi">
                          </div>
                          <div class="form-group">
                            <label>Disposisi Di</label>
                            <input name="disposisi_at" type="text" class="form-control" placeholder="Masukan Disposisi Di">                  
                          </div>
                          <div class="form-group">
                            <label>Dibalas Pada</label>
                            <input type="date" class="form-control" name="reply_at">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Surat Masuk</label>
                             <select name="mail_in_id" class="form-control" >
                            <option value="" disabled selected>Pilih Tipe Surat</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM mail_in");
                                  while ($row=$res->fetch_array()) {
                                  $description=$_REQUEST['description'];
                              ?>
                            <option value="<?php echo $row['mail_in_id'];?>">
                              <?php echo $row['mail_subject'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>                            
                          </div> 
                          <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                              <option value="" disabled selected="">Pilih Status</option>
                              <option value="dibaca">dibaca</option>
                              <option value="belum dibaca">belum dibaca</option>
                            </select>
                          </div>
                      </div>
                  </div>              
                  <div class="box-footer">
                    <a href="./index.php?page=disposition" class="btn btn-warning">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
                  </div>              
            </form>
          </div>
        </div>

<script type="text/javascript">
function validasi_input(form){
   if (form.dispo_id.value == ""){
    alert("Maaf Field Tidak Boleh Ada Yang Kosong!");
    form.dispo_id.focus();
    return (false);
  }
   if (form.disposisi_at.value == ""){
    alert("Maaf Field Tidak Boleh Ada Yang Kosong!");
    form.disposisi_at.focus();
    return (false);
  }
  if (form.reply_at.value == ""){
    alert("Maaf Field Tidak Boleh Ada Yang Kosong!");
    form.reply_at.focus();
    return (false);
  }
  if (form.mail_in_id.value == ""){
    alert("Maaf Field Tidak Boleh Ada Yang Kosong!");
    form.mail_in_id.focus();
    return (false);
  }
  if (form.status.value == ""){
    alert("Maaf Field Tidak Boleh Ada Yang Kosong!");
    form.status.focus();
    return (false);
  }
return (true);
}
</script>

<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $dispo_id=$_REQUEST['dispo_id'];
    $disposisi_at=$_REQUEST['disposisi_at'];
    $reply_at=$_REQUEST['reply_at'];
    $mail_in_id=$_REQUEST['mail_in_id'];
    $status=$_REQUEST['status'];
    $user=@$_SESSION['user_id'];
         
        $sql="INSERT INTO `disposition` (`dispo_id`, `disposition_at`, `reply_at`, `description`, `notification`, `mail_in_id`, `user_id`, `status`, `disposition_id`) VALUES ('$dispo_id', '$disposisi_at', '$reply_at', '$description', '0', '$mail_in_id', '$user', '$status', '$dispo_id');";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=disposition';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>

  </div>
</section>

