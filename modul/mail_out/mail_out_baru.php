  <section class="content-header">
      <h1>
        Tambah
        <small>Surat Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Master Data</a></li>
        <li><a href="#">Surat</a></li>
        <li><a href="#">Surat Keluar</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
            <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Keluar</h3>
            </div>
                <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
                  <div class="box-body">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Id Surat Keluar</label>
                            <input type="number" class="form-control" name="mail_out_id" placeholder="Masukan Id Surat">
                          </div>
                          <div class="form-group">
                            <label>Dikirim Pada</label>
                            <input name="sent_at" type="date" class="form-control">                  
                          </div>
                          <div class="form-group">
                            <label>Kode Surat</label>
                            <input type="number" class="form-control" name="mail_code" placeholder="Masukan Kode Surat">
                          </div>
                          <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control" name="mail_date">
                          </div> 
                        <div class="form-group">
                          <label>Surat Untuk</label>
                          <input type="text" class="form-control" name="mail_to" placeholder="Masukan Surat Untuk">
                        </div>
                      </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Subjek Surat</label>
                          <input type="text" class="form-control" name="mail_subject" placeholder="Masukan Subjek Surat">
                        </div> 
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <input type="text" class="form-control" name="description" placeholder="Masukan Deskripsi Surat">
                        </div> 
                        <div class="form-group">  
                          <label>Tipe Surat</label>               
                          <select name="mail_type_id" class="form-control" >
                            <option value="" disabled selected>Pilih Tipe Surat</option>
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
                        <div class="form-group">
                          <label>File Surat</label>
                          <input type="file" name="file_upload" >
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

<script type="text/javascript">
function validasi_input(form){
   if (form.sent_at.value == ""){
    alert("Maaf Field Tidak boleh ada yang kosong!");
    form.sent_at.focus();
    return (false);
  }if (form.mail_code.value == ""){
    alert("Maaf Field Tidak boleh ada yang kosong!");
    form.mail_code.focus();
    return (false);
  }if (form.mail_date.value == ""){
    alert("Maaf Field Tidak boleh ada yang kosong!");
    form.mail_date.focus();
    return (false);
  }if (form.mail_to.value == ""){
    alert("Maaf Field Tidak boleh ada yang kosong!");
    form.mail_to.focus();
    return (false);
  }if (form.mail_subject.value == ""){
    alert("Maaf Field Tidak boleh ada yang kosong!");
    form.mail_subject.focus();
    return (false);
  }if (form.description.value == ""){
    alert("Maaf Field Tidak boleh ada yang kosong!");
    form.description.focus();
    return (false);
  }if (form.file_upload.value == ""){
    alert("Maaf Field Tidak boleh ada yang kosong!");
    form.file_upload.focus();
    return (false);
  }
return (true);
}
</script>

<?php
$namafolder="gambar_keluar/";
$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $mail_out_id=$_REQUEST['mail_out_id'];
    $sent_at=$_REQUEST['sent_at'];
    $mail_code=$_REQUEST['mail_code'];
    $mail_date=$_REQUEST['mail_date'];
    $mail_to=$_REQUEST['mail_to'];
    $mail_type_id=$_REQUEST['mail_type_id'];
    $mail_subject=$_REQUEST['mail_subject'];
    $description=$_REQUEST['description'];    
    $nama_file=$_FILES['file_upload']['name'];
    $temp_file=$_FILES['file_upload']['tmp_name'];
    $user=@$_SESSION['user_id'];

    if ($mail_type_id =="" ) {
     ?>
        <script type="text/javascript">
            alert('Maaf Field Tidak boleh ada yang kosong!');
        </script><?php 
    }else{
        $gambar=$namafolder . basename($_FILES['file_upload']['name']);
        $upload=move_uploaded_file($_FILES['file_upload']['tmp_name'], $gambar);         
         
        $sql="INSERT INTO `mail_out` (`mail_out_id`, `sent_at`, `mail_code`, `mail_date`, `mail_to`, `mail_subject`, `description`, `file_upload`, `mail_type_id`, `user_id`) VALUES ('$mail_out_id', '$sent_at', '$mail_code', '$mail_date', '$mail_to', '$mail_subject', '$description', '$gambar', '$mail_type_id', '$user');";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=mail_out';
        </script><?php
    }else{
        echo "error";
    }
  }
}   

?>

  </div>
</section>

