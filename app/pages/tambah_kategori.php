<?php
session_start();
var_dump($_SESSION);
die;
include('header.php');
include('../../conf/config.php'); ?>

<title>Diskominfo | Tambah Data Ketegori</title>

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
            <h1 class="m-0"><span style="font-weight: bold;">Kategori |</span><span class="fw-normal"> Tambah Data Kategori Barang</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="data_kategori.php">Data Kategori Barang</a></li>
              <li class="breadcrumb-item active">Tambah Data Kategori Barang</li>
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
              <h3 class="card-title">Harap mengisi formulir dengan benar dan lengkap</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label for="id_kategori">Id Kategori</label>
                <input type="text" class="form-control" name="id_kategori" required>
              </div>
              <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" required>
              </div>

              <div class="tomboltambahkategori">
                <a class="btn btn-danger" href="data_barang.php">Batal</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
              </div>
              <!-- /.card-body -->

              <?php
              if (isset($_POST["simpan"])) {
                $idkategori = $_POST["id_kategori"];
                $namakategori = $_POST["nama_kategori"];

                $tambah = "INSERT INTO tb_kategori (id_kategori, nama_kategori) VALUES ('$idkategori', '$namakategori')";

                $qtambah = mysqli_query($koneksi, $tambah);

                if ($qtambah) {
                  echo "<script>window.location.href = 'data_kategori.php';</script>";
                } else {
                  echo 'Tidak bisa pindah';
                }
              }
              ?>
            </div>
            <div class="keterangantambahkategori">
              <label>Keterangan:</label>
              <br>
              <span> <i>1. Isi formulir kategori barang dengan benar.</i></span><br>
              <span> <i>2. Apabila ingin merubah <b>ID KATEGORI</b> harus menghapusnya terlebih dahulu, lalu menginputkan ulang.</i></span><br>
              <span> <i>3. Inputkan ID KATEGORI berbeda dengan yang telah di inputkan</i></span><br>
            </div>
          </div>
        </form>
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
  .keterangantambahkategori {
    font-style: italic;
    margin-top: 20px;
    margin-bottom: 20px;
    text-transform: lowercase;
    color: grey;
    margin-left: 20px;

  }
</style>