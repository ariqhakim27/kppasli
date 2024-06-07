<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>
<?php
if (isset($_GET["id_kategori"])) {
  $kategoriupdate = $_GET["id_kategori"];

  $result = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$kategoriupdate'");
  $data = mysqli_fetch_assoc($result);

  if (!$data) {
    echo "Data tidak ditemukan";
  }
} else {
  echo "ID tidak diberikan";
}
?>

<title>Diskominfo | Edit Data Kategori Barang</title>

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
            <h1 class="m-0"><span style="font-weight: bold;">Kategori |</span><span class="fw-normal"> Edit Data Kategori</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="data_kategori.php">Data Kategori</a></li>
              <li class="breadcrumb-item active">Edit Data Kategori</li>
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
              <h3 class="card-title">Formulir edit data kategori barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $data['id_kategori'] ?>" required>
              <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" value="<?php echo $data['nama_kategori'] ?>" required>
              </div>
              <div class="tombolkategori">
                <a class="btn btn-danger" href="data_kategori.php">Batal</a>
                <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                <?php
                if (isset($_POST["update"])) {
                  $idkategori = $_POST["id_kategori"];
                  $namakategori = $_POST["nama_kategori"];

                  $update = "UPDATE tb_kategori SET nama_kategori='$namakategori' WHERE id_kategori='$idkategori'";
                  $qupdate = mysqli_query($koneksi, $update);

                  if ($qupdate) {
                    echo "<script>window.location.href = 'data_kategori.php';</script>";
                    exit(); // Menambahkan exit setelah redirect
                  } else {
                    echo "Error updating record: " . mysqli_error($koneksi);
                  }
                }
                ?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </form>
        <!-- /.card -->

      </div>
    </section>
    <div class="keteranganeditkategori">
      <label>Keterangan:</label>
      <br>
      <span> <i>1. Isi formulir dengan benar </i></span>
      <br>
      <span> <i>2. Apabila ingin merubah ID KATEGORI harus menghapusnya terlebih dahulu dan menginputkan kembali </i></span>
    </div>
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
  .tombolkategori {
        margin-top: 20px;
        
    }
    .keteranganeditkategori{
        font-style: italic;
        margin-top: 15px;
        text-transform: lowercase;
        color: grey;
        margin-left: 40px;
    }
</style>