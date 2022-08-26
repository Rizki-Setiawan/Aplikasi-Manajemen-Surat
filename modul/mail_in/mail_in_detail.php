  <section class="content-header">
      <h1>
        Detail
        <small>Surat Masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Master Data</a></li>
        <li><a href="#">Surat</a></li>
        <li><a href="#">Surat Masuk</a></li>
        <li class="active"><a href="#">Detail</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Masuk</h3>
            </div>
            <?php
             $mail_in_id = $_REQUEST['mail_in_id'];

                $sql = mysqli_query($con, "SELECT mail_in.file_upload,mail_in.mail_code,mail_in.incoming_at,mail_in.mail_date,mail_in.mail_from,mail_in.mail_to,mail_in.mail_subject,mail_in.description,mail_type.type FROM mail_in,mail_type WHERE mail_in_id='$mail_in_id' AND mail_in.mail_type_id=mail_type.mail_type_id");
                while($row = mysqli_fetch_array($sql)){
            ?>
                                        <br><table width="1000px">
                                          <tr>
                                          <td rowspan="9"><center>
                                                <img src="<?php echo $row['file_upload']; ?>" class="img-rounded" height="300" width="250" st4yle="border: 2px solid #666;" /></center>
                                            </td>
                                          </tr>
                                          <tr>
                                          <td>Kode Surat</td>
                                          <td>:&nbsp&nbsp<?php echo $row['mail_code']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Datang</td>
                                          <td>:&nbsp&nbsp<?php echo $row['incoming_at']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Tanggal Surat</td>
                                          <td>:&nbsp&nbsp<?php echo $row['mail_date']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Surat Dari</td>
                                          <td>:&nbsp&nbsp<?php echo $row['mail_from']; ?></td>
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
                    <a href="./index.php?page=mail_in" class="btn btn-primary pull-right">Kembali</a>
             </div>
          </div>
      </div>
     </div>
     </section>