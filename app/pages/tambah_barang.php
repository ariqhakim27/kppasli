<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>

<title>Diskominfo | Tambah Data Barang</title>

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
            <h1 class="m-0"><span style="font-weight: bold;">Barang |</span><span class="fw-normal"> Tambah Data Barang</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="data_barang.php">Barang</a></li>
              <li class="breadcrumb-item active">Tambah Barang</li>
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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                  </div>
                  <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" name="kode_barang" required>
                  </div>
                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" required>
                      <option value="">Pilih Kategori</option>
                      <?php
                      include('../../conf/config.php');
                      $kategori = "SELECT * FROM tb_kategori";
                      $qkategori = mysqli_query($koneksi, $kategori);

                      if ($qkategori) {
                        while ($row = mysqli_fetch_assoc($qkategori)) {
                      ?>
                          <option value="<?php echo $row['id_kategori']; ?>">
                            <?php echo $row['nama_kategori']; ?>
                          </option>
                      <?php
                        }
                        mysqli_free_result($qkategori);
                      } else {
                        echo "Error: " . $kategori . "<br>" . mysqli_error($koneksi);
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="merek">Merek</label>
                    <input type="text" class="form-control" name="merek" required>
                  </div>
                  <div class="form-group">
                    <label for="noseri">No Seri</label>
                    <input type="text" class="form-control" name="no_seri" required>
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" required>
                  </div>
                  <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="bahan">Bahan</label>
                    <input type="text" class="form-control" name="bahan" required>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" required>
                  </div>
                  <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <select class="form-control" name="kondisi" required>
                      <option value="">Pilih Kondisi</option>
                      <option value="baik">Baik</option>
                      <option value="kurang baik">Kurang Baik</option>
                      <option value="rusak">Rusak</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="thn_pembuatan">Tahun Pembuatan</label>
                    <input type="date" class="form-control" name="thn_pembuatan" required>
                  </div>

                  <div class="form-group">
                    <label for="ruangan">Ruangan</label>
                    <select class="form-control" name="ruangan" required>
                      <option value="">Pilih Ruangan</option>
                      <?php
                      include('../../conf/config.php');
                      $query = "SELECT * FROM tb_ruangan JOIN tb_bidang ON tb_bidang.id_bidang=tb_ruangan.id_bidang";
                      $result = mysqli_query($koneksi, $query);

                      if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                          <option value="<?php echo $row['id_ruangan']; ?>">
                            <?php echo $row['nama_ruangan'] . " - Bidang : " . $row['nama_bidang']; ?>
                          </option>
                      <?php
                        }
                        mysqli_free_result($result);
                      } else {
                        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                      }
                      mysqli_close($koneksi);
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <select class="form-control" name="keterangan" required>
                      <option value="Baru">Baru</option>
                      <option value="Mutasi">Mutasi</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tgl_input">Tanggal Input</label>
                    <input type="date" class="form-control" name="tgl_input" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nip">Penanggung Jawab</label>
                    <select class="form-control" name="nip" required>
                      <option value="">Pilih Penanggung Jawab</option>
                      <?php
                      include('../../conf/config.php');
                      $query = "SELECT * FROM tb_pegawai";
                      $result = mysqli_query($koneksi, $query);

                      if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                          <option value="<?php echo $row['nip']; ?>">
                            <?php echo $row['nama_pegawai'] . ' - ' . $row['nip']; ?>
                          </option>
                      <?php
                        }
                        mysqli_free_result($result);
                      } else {
                        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                      }

                      mysqli_close($koneksi);
                      ?>
                    </select>
                  </div>
                </div>
              </div class="tomboltambah">
              <br>
              <a class="btn btn-danger" href="data_barang.php">Batal</a>
              <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
              <?php
              include('../../conf/config.php');
              if (isset($_POST["simpan"])) {
                // Retrieve form data
                $idbarang = $_POST["id_barang"];
                $namabarang = $_POST["nama_barang"];
                $kategori = $_POST["kategori"];
                $merek = $_POST["merek"];
                $noseri = $_POST["no_seri"];
                $jumlah = $_POST["jumlah"];
                $ukuran = $_POST["ukuran"];
                $bahan = $_POST["bahan"];
                $harga = $_POST["harga"];
                $kondisi = $_POST["kondisi"];
                $thnpembuatan = $_POST["thn_pembuatan"];
                $pj = $_POST["nip"];
                $ruangan = $_POST["ruangan"];
                $keterangan = $_POST["keterangan"];
                $tglinput = $_POST["tgl_input"];

                // SQL query
                $tambah = "INSERT INTO tb_barang (id_barang, nama_barang, id_kategori, merek, no_seri, jumlah, ukuran, bahan, harga, kondisi, thn_pembuatan, nip, id_ruangan, keterangan, tgl_input) VALUES ('$idbarang', '$namabarang', '$kategori', '$merek', '$noseri', '$jumlah', '$ukuran', '$bahan', '$harga', '$kondisi', '$thnpembuatan', '$pj', '$ruangan', '$keterangan', '$tglinput')
                INSERT INTO ";

                // Execute the query
                $qtambah = mysqli_query($koneksi, $tambah);

                if ($qtambah) {
                  echo "<script>window.location.href = 'data_barang.php';</script>";
                } else {
                  echo "Error: " . $tambah . "<br>" . mysqli_error($koneksi);
                }
              }
              ?>
            </div>
          </div>
          <div class="keterangantambahbarang">
            <label>Keterangan:</label>
            <br>
            <span> <i>Ketika mengisi formulir tambah barang, pastikan Anda memberikan informasi yang benar dan lengkap sesuai dengan ketentuan yang tertera. Mohon perhatikan setiap kolom dan isilah dengan data yang akurat untuk memastikan pendataan barang aset yang tepat dan akurat</i></span>
          </div>
      </div>
      </form>
  </div>
  </section>
<?php include('footer.php'); ?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
</aside>
</html>

<style>
  .tomboltambah {
    margin-bottom: 10px;
  }

  .keterangantambahbarang {
    font-style: italic;
    margin-top: 20px;
    margin-bottom: 20px;
    text-transform: lowercase;
    color: grey;
    margin-left: 20px;

  }
</style>