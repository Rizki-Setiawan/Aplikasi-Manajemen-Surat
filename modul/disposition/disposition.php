 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'disposition_baru.php';
                break;
            case 'edit':
                include 'disposition_edit.php';
                break;
            case 'hapus':
                include 'disposition_hapus.php';
                break;
            
        }
    } else {

        echo  '
                 <section class="content-header">
                  <h1>
                    Tabel
                    <small>Disposisi</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
                    <li class="active"><a href="#">Disposisi</a></li>
                  </ol>
                </section>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">                            
                           <div class="box box-warning"><br>
                           <div class="col-xs-2">
                                 <a href="?page=disposition&aksi=baru" class="btn btn-block btn-info"><i class="fa fa-plus"></i>&nbsp&nbspTambah Data</a>
                            </div><br><br>
                            <div class="box-body">                                
                              <table class="table table-bordered table-striped js-exportable">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Id</th>
                                  <th>Disposisi Di</th>                                          
                                  <th>Dibalas Pada</th>
                                  <th>Surat</th>
                                  <th>Deskripsi</th>
                                  <th>Status</th>
                                  <th>Tindakan</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT disposition.dispo_id,disposition.disposition_at,disposition.reply_at,mail_in.mail_subject,mail_in.description,disposition.status FROM mail_in , disposition WHERE mail_in.mail_in_id =disposition.mail_in_id ");
                            if(mysqli_num_rows($sql) > 0){
                                $no = 0;

                                 while($row = mysqli_fetch_array($sql)){
                                    $no++;
                                echo '  
                                 <script type="text/javascript" language="JavaScript">
                                    function konfirmasi(){
                                        tanya = confirm("Anda yakin akan menghapus data ini?");
                                        if (tanya == true) return true;
                                        else return false;
                                    }
                                </script>
                                 <tr>
                                 <td>'.$no.'</td>
                                 <td>'.$row['dispo_id'].'</td>
                                 <td>'.$row['disposition_at'].'</td>
                                 <td>'.$row['reply_at'].'</td>                                
                                 <td>'.$row['mail_subject'].'</td>
                                 <td>'.$row['description'].'</td>
                                 <td>'.$row['status'].'</td>

                                 <td>        
                                 <a href="?page=disposition&aksi=hapus&submit=yes&dispo_id='.$row['dispo_id'].'" onclick="return konfirmasi()" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                 </td>';
                                        }
                                } 
                            echo '                                                            
                                    </tbody>
                                </table>

                            </div>
                          </div>
                        </div>
                      </div>
                    </section>';
    }
?>
             