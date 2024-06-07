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
<title>Diskominfo | Detail Data Barang | </title>
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
                        <h1 class="m-0"><span style="font-weight: bold;">Detail |</span><span class="fw-normal"> Data Barang</span></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="data_barang.php">Data Barang</a></li>
                            <li class="breadcrumb-item active">Detail Data Barang</li>
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
                                <h2 class="card-title">Detail Data Barang: <b><?php echo $data['nama_barang'] ?> </b> - <b><i><?php echo $data['nama_pegawai'] ?></b></i></h2>
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
                                        <div class="tomboldetail">
                                            <a class="btn btn-danger" href="data_barang.php">Batal</a>
                                            <button type="submit" class="btn btn-warning" name="update">Mutasikan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="keteranganeditbarang">
                            <label>Keterangan:</label>
                            <br>
                            <span> <i>1. Mutasi sebagai perpindahan atau pergantian nama pegawai, bidang, dan ruangan </i></span>
                            <br>
                            <span> <i>2. Setiap melakukan mutasi akan masuk ke dalam menu <b style="font-size:18px";>MUTASI BARANG</b> </i></span>
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

    .tomboldetail {
        margin-top: 10px;
        margin-left: 6px;
        color: white;
    }

    .keteranganeditbarang {
        font-style: italic;
        margin-top: 15px;
        text-transform: lowercase;
        color: grey;
        margin-left: 40px;
    }
</style>