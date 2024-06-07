<!DOCTYPE html>
<html lang="en">
<?php include ('header.php');?>
<?php include ('../../conf/config.php');?>

<title>Diskominfo | Dashboard</title>

<div class="wrapper">

  <!-- Preloader -->

  <!-- Navbar -->
  <?php include ('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <?php include ('logo.php');?>

    <!-- Sidebar -->
    <?php include ('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
    $get1 = mysqli_query($koneksi, "SELECT * FROM tb_barang");
    $count1 = mysqli_num_rows($get1);

    $get2 = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
    $count2 = mysqli_num_rows($get2);

    $get3 = mysqli_query($koneksi, "SELECT * FROM tb_bidang");
    $count3 = mysqli_num_rows($get3);

    $get4 = mysqli_query($koneksi, "SELECT * FROM tb_ruangan");
    $count4 = mysqli_num_rows($get4);

    $get5 = mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
    $count5 = mysqli_num_rows($get5);

    $get6 = mysqli_query($koneksi, "SELECT * FROM tb_mutasi");
    $count6 = mysqli_num_rows($get6);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box shadow">
              <span class="info-box-icon"><i class="fas fa-bullseye"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Visi Misi</b></span>
                <span class="info-box-text">H</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow">
              <span class="info-box-icon"><i class="fas fa-box"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Barang</span>
                <span class="info-box-number"><?=$count1?></span>
              </div>
              <a href="data_barang.php" class="info-box-icon bg-white">
                <i class="fas fa-angle-right"></i>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow">
              <span class="info-box-icon"><i class="fas fa-cube"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kategori Barang</span>
                <span class="info-box-number"><?=$count2?></span>
              </div>
              <a href="data_kategori.php" class="info-box-icon bg-white">
                <i class="fas fa-angle-right"></i>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow">
              <span class="info-box-icon"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bidang</span>
                <span class="info-box-number"><?=$count3?></span>
              </div>
              <a href="data_bidang.php" class="info-box-icon bg-white">
                <i class="fas fa-angle-right"></i>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow">
              <span class="info-box-icon"><i class="fas fa-desktop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ruangan</span>
                <span class="info-box-number"><?=$count4?></span>
              </div>
              <a href="data_ruangan.php" class="info-box-icon bg-white">
                <i class="fas fa-angle-right"></i>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pegawai</span>
                <span class="info-box-number"><?=$count5?></span>
              </div>
              <a href="data_pegawai.php" class="info-box-icon bg-white">
                <i class="fas fa-angle-right"></i>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow">
              <span class="info-box-icon"><i class="fas fa-exchange-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mutasi</span>
                <span class="info-box-number"><?=$count6?></span>
              </div>
              <a href="data_mutasi.php" class="info-box-icon bg-white">
                <i class="fas fa-angle-right"></i>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include ('footer.php');?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</html>
