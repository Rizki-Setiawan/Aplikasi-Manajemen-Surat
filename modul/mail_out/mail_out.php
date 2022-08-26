 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'mail_out_baru.php';
                break;
            case 'edit':
                include 'mail_out_edit.php';
                break;
            case 'hapus':
                include 'mail_out_hapus.php';
                break;
            case 'detail':
                include 'mail_out_detail.php';
                break;
            
        }
    } else {

        echo  '
                 <section class="content-header">
                  <h1>
                    Tabel
                    <small>Surat Keluar</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
                    <li class="active"><a href="#">Surat</a></li>
                    <li class="active"><a href="#">Surat Keluar</a></li>
                  </ol>
                </section>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">                            
                           <div class="box box-danger"><br>
                           <div class="col-xs-2">
                                 <a href="?page=mail_out&aksi=baru" class="btn btn-block btn-info"><i class="fa fa-plus"></i>&nbsp&nbspTambah Data</a>
                            </div><br><br>
                            <div class="box-body">                                
                              <table class="table table-bordered table-striped js-exportable">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Id</th>
                                  <th>Kode Surat</th>                                          
                                  <th>Dikirim Pada</th>
                                  <th>Tanggal Surat </th>
                                  <th>Surat Untuk</th>
                                  <th>Type Surat</th>
                                  <th>Tindakan</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT mail_out.mail_out_id,mail_out.mail_code,mail_out.sent_at,mail_out.mail_date,mail_out.mail_to,mail_type.type FROM mail_out , mail_type WHERE mail_out.mail_type_id =mail_type.mail_type_id ");
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
                                 <td>'.$row['mail_out_id'].'</td>
                                 <td>'.$row['mail_code'].'</td>
                                 <td>'.$row['sent_at'].'</td>                                
                                 <td>'.$row['mail_date'].'</td>
                                 <td>'.$row['mail_to'].'</td>
                                 <td>'.$row['type'].'</td>

                                 <td>  
                                 <a href="?page=mail_out&aksi=detail&mail_out_id='.$row['mail_out_id'].'" class="btn btn-warning btn-flat" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-search"></i></a>        
                                 <a href="?page=mail_out&aksi=edit&mail_out_id='.$row['mail_out_id'].'" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                 <a href="?page=mail_out&aksi=hapus&submit=yes&mail_out_id='.$row['mail_out_id'].'" onclick="return konfirmasi()" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i> </a>
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
             