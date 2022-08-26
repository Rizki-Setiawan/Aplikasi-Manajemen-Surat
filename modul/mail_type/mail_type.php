 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'mail_type_baru.php';
                break;
            case 'edit':
                include 'mail_type_edit.php';
                break;
            case 'hapus':
                include 'mail_type_hapus.php';
                break;
            
        }
    } else {

        echo  '
                 <section class="content-header">
                  <h1>
                    Tabel
                    <small>Tipe Surat</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
                    <li class="active"><a href="#">Tipe Surat</a></li>
                  </ol>
                </section>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">                            
                           <div class="box box-success"><br>
                           <div class="col-xs-2">
                                <a href="?page=mail_type&aksi=baru" class="btn btn-block btn-info"><i class="fa fa-plus"></i>&nbsp&nbspTambah Data</a>
                            </div><br><br>
                            <div class="box-body">                                
                              <table class="table table-bordered table-striped js-exportable">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Id Tipe</th>
                                  <th>Tipe Surat</th>
                                  <th>Tindakan</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT * FROM mail_type");
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
                                 <td>'.$row['mail_type_id'].'</td>
                                 <td>'.$row['type'].'</td>
                                 <td>
                        
                                 <a href="?page=mail_type&aksi=edit&mail_type_id='.$row['mail_type_id'].'" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                 <a href="?page=mail_type&aksi=hapus&submit=yes&mail_type_id='.$row['mail_type_id'].'" onclick="return konfirmasi()" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i> </a>
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
             