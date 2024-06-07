<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>

<title>Diskominfo | Tambah Ruangan</title>

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
            <h1 class="m-0"><span style="font-weight: bold;">Ruangan |</span><span class="fw-normal"> Tambah Ruangan</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="data_ruangan.php">Ruangan</a></li>
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
              <h3 class="card-title"><b><i>Harap mengisi formulir dengan benar dan lengkap</b></i></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label for="id_ruangan">Id Ruangan</label>
                <input type="text" class="form-control" name="id_ruangan" required>
              </div>
              <div class="form-group">
                <label for="nama_ruangan">Nama Ruangan</label>
                <input type="text" class="form-control" name="nama_ruangan" required>
              </div>
              <div class="form-group">
                <label for="id_bidang">Bidang</label>
                <select class="form-control" name="id_bidang" required>
                  <option value="">Pilih Bidang</option>
                  <?php
                  $query = "SELECT * FROM tb_bidang";
                  $result = mysqli_query($koneksi, $query);

                  if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <option value="<?php echo $row['id_bidang']; ?>"><?php echo $row['nama_bidang']; ?></option>
                  <?php
                    }
                    mysqli_free_result($result);
                  } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                  }
                  ?>
                </select>
              </div>
              <br>
              <div class="tombiltambahruangan">
                <a class="btn btn-danger" href="data_ruangan.php">Batal</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                <?php
                if (isset($_POST["simpan"])) {
                  $idruangan = $_POST["id_ruangan"];
                  $namaruangan = $_POST["nama_ruangan"];
                  $idbidang = $_POST["id_bidang"];

                  $tambah = "INSERT INTO tb_ruangan (id_ruangan, nama_ruangan, id_bidang) VALUES ('$idruangan', '$namaruangan', '$idbidang')";
                  $qtambah = mysqli_query($koneksi, $tambah);

                  if ($qtambah) {
                    echo "<script>window.location.href = 'data_ruangan.php';</script>";
                  } else {
                    echo 'Tidak bisa menambah data ruangan.';
                  }
                }
                ?>
              </div>

            </div>
            
            <!-- /.card-body -->
          </div>
        </form>
        <!-- /.card -->
        <div class="keterangantambahruangan">
              <label>Keterangan:</label>
              <br>
              <span> <i>1. Isi formulir kategori barang dengan benar.</i></span>
              <br>
              <span> <i>2. Apabila ingin merubah <b>ID RUANGAN</b> harus menghapusnya terlebih dahulu, lalu menginputkan ulang.</i></span>
              <br>
              <span> <i>3. Inputkan ID RUANGAN berbeda dengan yang telah di inputkan.</i></span>
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
  .keterangantambahruangan {
    font-style: italic;
    margin-top: 20px;
    margin-bottom: 20px;
    text-transform: lowercase;
    color: grey;
    margin-left: 20px;

  }
</style>