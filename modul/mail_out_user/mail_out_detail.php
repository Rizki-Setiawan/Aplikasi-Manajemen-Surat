  <section class="content-header">
      <h1>
        Detail
        <small>Surat Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Master Data</a></li>
        <li><a href="#">Surat</a></li>
        <li><a href="#">Surat Keluar</a></li>
        <li class="active"><a href="#">Detail</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Keluar</h3>
            </div>
            <?php
             $mail_out_id = $_REQUEST['mail_out_id'];

                $sql = mysqli_query($con, "SELECT mail_out.file_upload,mail_out.mail_code,mail_out.sent_at,mail_out.mail_date,mail_out.mail_to,mail_out.mail_subject,mail_out.description,mail_type.type FROM mail_out,mail_type WHERE mail_out_id='$mail_out_id' AND mail_out.mail_type_id=mail_type.mail_type_id");
                while($row = mysqli_fetch_array($sql)){
            ?>
                                        <br><table width="1000px">
                                          <tr>
                                          <td rowspan="8"><center>
                                                <img src="<?php echo $row['file_upload']; ?>" class="img-rounded" height="300" width="250" st4yle="border: 2px solid #666;" /></center>
                                            </td>
                                          </tr>
                                          <tr>
                                          <td>Kode Surat</td>
                                          <td>:&nbsp&nbsp<?php echo $row['mail_code']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Datang</td>
                                          <td>:&nbsp&nbsp<?php echo $row['sent_at']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Tanggal Surat</td>
                                          <td>:&nbsp&nbsp<?php echo $row['mail_date']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Surat Untuk</td>
                                          <td>:&nbsp&nbsp<?php echo $row['mail_to']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Subjek</td>
                                          <td>:&nbsp&nbsp<?php echo $row['mail_subject']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Tipe Surat</td>
                                          <td>:&nbsp&nbsp<?php echo $row['type']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Deskripsi</td>
                                          <td>:&nbsp&nbsp<?php echo $row['description']; ?></td>
                                          </tr>
                                          </table><br>
            <?php
            }
            ?>

             <div class="box-footer">
                    <a href="./index.php?page=mail_out" class="btn btn-primary pull-right">Kembali</a>
             </div>
          </div>
      </div>
     </div>
     </section>