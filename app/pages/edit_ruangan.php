<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
include('../../conf/config.php');

if (isset($_GET["id_ruangan"])) {
    $ruanganupdate = $_GET["id_ruangan"];

    $result = mysqli_query($koneksi, "SELECT * FROM tb_ruangan WHERE id_ruangan='$ruanganupdate'");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "Data tidak ditemukan";
    }
} else {
    echo "ID tidak diberikan";
}
?>


<title>Diskominfo | Edit Data Ruangan</title>

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
                        <h1 class="m-0"><span style="font-weight: bold;">Ruangan |</span><span class="fw-normal"> Edit Data Ruangan</span></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="data_ruangan.php">Data Ruangan</a></li>
                            <li class="breadcrumb-item active">Edit Data Ruangan</li>
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
                            <input type="hidden" class="form-control" name="id_ruangan" value="<?php echo $data['id_ruangan']; ?>" required>
                            <div class="form-group">
                                <label for="nama_ruangan">Nama Ruangan</label>
                                <input type="text" class="form-control" name="nama_ruangan" value="<?php echo $data['nama_ruangan'] ?>" required>
                            </div>
                            <br>
                            <div>
                                <a class="btn btn-danger" href="data_ruangan.php">Batal</a>
                                <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                                <?php
                                if (isset($_POST["update"])) {
                                    $idruangan = $_POST["id_ruangan"];
                                    $namaruangan = $_POST["nama_ruangan"];

                                    $update = "UPDATE tb_ruangan SET id_ruangan='$idruangan', nama_ruangan='$namaruangan' WHERE id_ruangan='$ruanganupdate'";

                                    $qupdate = mysqli_query($koneksi, $update);

                                    if ($qupdate) {
                                        echo "<script>window.location.href = 'data_ruangan.php';</script>";
                                    } else {
                                        echo mysqli_error($koneksi);
                                    }
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="keteranganeditruangan">
                        <label>Keterangan:</label>
                        <br>
                        <span> <i>1. Isi formulir dengan benar </i></span>
                        <br>
                        <span> <i>2. Apabila ingin merubah <b>ID RUANGAN</b> dan <b>BIDANG</b> harus menghapusnya terlebih dahulu dan menginputkan kembali </i></span>
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

    <!-- ./wrapper -->

</html>

<style>
    .keteranganeditruangan {
        font-style: italic;
        margin-bottom: 15 px;
        text-transform: lowercase;
        color: grey;
        margin-left: 25px;
    }
</style>