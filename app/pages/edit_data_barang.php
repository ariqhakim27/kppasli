<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>
<?php

if (isset($_GET["id_barang"])) {
    $barangupdate = $_GET["id_barang"];
    $result = mysqli_query($koneksi, "SELECT * FROM tb_barang 
    JOIN tb_pegawai ON tb_pegawai.nip=tb_barang.nip
    WHERE id_barang='$barangupdate'");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {

        echo "Data tidak ditemukan";
    }

    $qkategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
} else {
    echo "ID tidak diberikan";
}
?>
<title>Diskominfo | Edit Data Barang | </title>
<div class="wrapper">

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
                        <h1 class="m-0"><span style="font-weight: bold;">Edit |</span><span class="fw-normal"> Data Barang</span></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="data_barang.php">Data Barang</a></li>
                            <li class="breadcrumb-item active">Edit Data Barang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- card-header -->
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Detail Barang: <b><?php echo $data['nama_barang'] ?> </b> - <b><i><?php echo $data['nama_pegawai'] ?></b></i></h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php

                                $qdetail = mysqli_query($koneksi, "SELECT * FROM tb_barang 
                                JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.id_kategori
                                JOIN tb_pegawai ON tb_barang.nip = tb_pegawai.nip 
                                JOIN tb_ruangan ON tb_barang.id_ruangan = tb_ruangan.id_ruangan
                                JOIN tb_bidang ON tb_ruangan.id_bidang=tb_bidang.id_bidang
                                WHERE tb_barang.id_barang = '$data[id_barang]'");

                                $detail_barang = mysqli_fetch_assoc($qdetail);
                                ?>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Kode Barang: </strong> <?= $detail_barang['id_barang']; ?></p>
                                            <p><strong>Kategori: </strong> <?= $detail_barang['nama_kategori']; ?></p>
                                            <p><strong>Merek: </strong> <?= $detail_barang['merek']; ?></p>
                                            <p><strong>No Seri: </strong> <?= $detail_barang['no_seri']; ?></p>
                                            <p><strong>Jumlah: </strong> <?= $detail_barang['jumlah']; ?></p>
                                            <p><strong>Ukuran: </strong> <?= $detail_barang['ukuran']; ?></p>
                                            <p><strong>Bahan: </strong> <?= $detail_barang['bahan']; ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Harga: </strong> Rp.<?= $detail_barang['harga']; ?></p>
                                            <p><strong>Kondisi: </strong> <?= $detail_barang['kondisi']; ?></p>
                                            <p><strong>Tahun Pembuatan: </strong> <?= $detail_barang['thn_pembuatan']; ?></p>
                                            <p><strong>Bidang: </strong> <?= $detail_barang['nama_bidang']; ?></p>
                                            <p><strong>Ruangan: </strong> <?= $detail_barang['nama_ruangan']; ?></p>
                                            <p><strong>Keterangan: </strong> <?= $detail_barang['keterangan']; ?></p>
                                            <p><strong>Tanggal Masuk: </strong> <?= $detail_barang['tgl_input']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <section class="content">
                                    <div class="container-fluid">
                                        <form action="" method="POST">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="font-size:20px; "><b><i>Formulir edit data barang</i></b></h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                                                            <div class="form-group">
                                                                <label for="nama_barang">Nama Barang</label>
                                                                <input type="text" class="form-control" name="nama_barang" required>
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
                                                        <div class="tomboledit">
                                                            <a class="btn btn-danger" href="data_barang.php">Batal</a>
                                                            <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        
                                        if (isset($_POST["update"])) {
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
                                            $keterangan = $_POST["keterangan"];
                                            $tglinput = $_POST["tgl_input"];

                                            $update = "UPDATE tb_barang SET id_barang='$idbarang', nama_barang='$namabarang', id_kategori='$kategori', merek='$merek', no_seri='$noseri', jumlah='$jumlah', ukuran='$ukuran', bahan='$bahan', harga='$harga', kondisi='$kondisi', thn_pembuatan='$thnpembuatan', keterangan='$keterangan', tgl_input='$tglinput' WHERE id_barang='$idbarang'";

                                            $qupdate = mysqli_query($koneksi, $update);

                                            if ($qupdate) {
                                                echo "<script>window.location.href = 'data_barang.php';</script>";
                                            } else {
                                                mysqli_error($koneksi);
                                            }
                                        }

                                        mysqli_close($koneksi);
                                        ?>
                                    </div>
                                </section>

                            </div>
                        </div>
                        <div class="keteranganeditbarang">
                            <label>Keterangan:</label>
                            <br>
                            <span> <i>1. Isi formulir dengan benar </i></span>
                            <br>
                            <span> <i>2. Apabila ingin merubah PENANGGUNG JAWAB, BIDANG, DAN RUANGAN lakukan pada menu mutasi </i></span>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->
        </section>
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


</body>

</html>
<style>
    .namaform {
        /* margin-bottom: 10px; */
        margin-top: 10px;
    }

    .tomboledit {
        margin-top: 10px;
        margin-left: 6px;
    }

    .keteranganeditbarang {
        font-style: italic;
        margin-top: 15px;
        text-transform: lowercase;
        color: grey;
        margin-left: 40px;
    }
</style>