<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body"><br>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM mail_in");
              $hasil = mysqli_num_rows($sql);
              echo $hasil;
              ?>
             </h3>
              <p>Surat Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-inbox"></i>
            </div>
            <a href="index.php?page=mail_in" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM mail_out");
              $hasil1 = mysqli_num_rows($sql);
              echo $hasil1;
              ?>
             </h3>
              <p>Surat Keluar</p>
            </div>
            <div class="icon">
              <i class="fa fa-external-link"></i>
            </div>
            <a href="index.php?page=mail_out" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM disposition");
              $hasil2 = mysqli_num_rows($sql);
              echo $hasil2;
              ?>
             </h3>
              <p>Disposisi</p>
            </div>
            <div class="icon">
              <i class="fa fa-retweet"></i>
            </div>
            <a href="index.php?page=disposition" class="small-box-footer">Info Selegkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM user");
              $hasil3 = mysqli_num_rows($sql);
              echo $hasil3;
              ?>
             </h3>
              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="#" class="small-box-footer">Pengguna <i class="fa fa-group"></i></a>
          </div>
        </div>


        </div>
      </div>
    </div>
  </div>
</section>

 