<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>

<title>Diskominfo | Tambah Bidang</title>

<div class="wrapper">

  <!-- Preloader -->

  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('logo.php'); ?>

    <!-- Sidebar -->
    <?php include('sidebar.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><span style="font-weight: bold;">Bidang |</span><span class="fw-normal"> Tambah Bidang</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="data_kategori.php">Bidang</a></li>
              <li class="breadcrumb-item active">Tambah Bidang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- form tambah kategori-->
        <form action="" method="post">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title"><b><i>Harap mengisi formulir dengan benar dan lengkap</i></b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label for="id_bidang">Id Bidang</label>
                <input type="text" class="form-control" name="id_bidang" required>
              </div>
              <div class="form-group">
                <label for="nama_bidang">Nama Bidang</label>
                <input type="text" class="form-control" name="nama_bidang" required>
              </div>
              <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" name="lokasi" required>
              </div>
              <br>
              <div class="tomboltambahbidang">
                <a class="btn btn-danger" href="data_bidang.php">Batal</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>

                <?php
                if (isset($_POST["simpan"])) {
                  $idbidang = $_POST["id_bidang"];
                  $namabidang = $_POST["nama_bidang"];
                  $lokasibidang = $_POST["lokasi"];

                  $tambah = "INSERT INTO tb_bidang (id_bidang, nama_bidang, lokasi) VALUES ('$idbidang', '$namabidang', '$lokasibidang')";

                  $qtambah = mysqli_query($koneksi, $tambah);

                  if ($qtambah) {
                    echo "<script>window.location.href = 'data_bidang.php';</script>";
                  } else {
                    echo 'Tidak bisa pindah';
                  }
                }
                ?>
              </div>
            </div>
            <!-- /.card-body -->

          </div>
        </form>
        <!-- /.card -->
        <div class="keterangantambahbidang">
          <label>Keterangan:</label>
          <br>
          <span> <i>1. Isi formulir Data Bidang dengan benar.</i></span><br>
          <span> <i>2. Apabila ingin merubah ID BIDANG harus menghapusnya terlebih dahulu, lalu menginputkan ulang.</i></span><br>
        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('footer.php'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</html>

<style>
  .keterangantambahbidang {
    font-style: italic;
    margin-top: 20px;
    margin-bottom: 20px;
    text-transform: lowercase;
    color: grey;
    margin-left: 20px;

  }
</style>