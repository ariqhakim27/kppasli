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
                        <h1 class="m-0"><span style="font-weight: bold;">Barang |</span><span class="fw-normal"> Tambah Barang</span></h1>
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
                            <h3 class="card-title">Silahkan isi dengan benar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id_barang">Id Barang</label>
                                    <input type="text" class="form-control" name="id_barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="namabarang">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        include '../../conf/config.php';
                                        $kategori = "SELECT * FROM tb_kategori";
                                        $qkategori = mysqli_query($conn, $kategori);

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
                                            echo "Error: " . $kategori . "<br>" . mysqli_error($conn);
                                        }
                                        mysqli_close($conn);
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
                                    <label for="nip">Penanggung Jawab</label>
                                    <select class="form-control" name="nip" required>
                                        <option value="">Pilih Penanggung Jawab</option>
                                        <?php
                                        include('../../conf/config.php');
                                        $query = "SELECT * FROM tb_pegawai";
                                        $result = mysqli_query($conn, $query);

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
                                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                        }

                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ruangan">Ruangan</label>
                                    <select class="form-control" name="ruangan" required>
                                        <option value="">Pilih Ruangan</option>
                                        <?php
                                        include('../../conf/config.php');
                                        $query = "SELECT * FROM tb_ruangan JOIN tb_bidang ON tb_bidang.id_bidang=tb_ruangan.id_bidang";
                                        $result = mysqli_query($conn, $query);

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
                                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                        }

                                        mysqli_close($conn);
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
                                  
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-white">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            <?php
                            include('../../conf/config.php');
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
                    </div>
                </form>
                <!-- /.card -->

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