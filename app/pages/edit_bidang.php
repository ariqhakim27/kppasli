<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>
<?php
if (isset($_GET["id_bidang"])) {
    $bidangupdate = $_GET["id_bidang"];

    $result = mysqli_query($koneksi, "SELECT * FROM tb_bidang WHERE id_bidang='$bidangupdate'");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {

        echo "Data tidak ditemukan";
    }
} else {
    echo "ID tidak diberikan";
}

?>

<title>Diskominfo | Edit Data Bidang</title>

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
                        <h1 class="m-0"><span style="font-weight: bold;">Bidang |</span><span class="fw-normal"> Edit Data Bidang</span></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="data_bidang.php">Data Bidang</a></li>
                            <li class="breadcrumb-item active">Edit Data Bidang</li>
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
                            <h3 class="card-title">Formulir edit data bidang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <input type="hidden" class="form-control" name="id_bidang" value="<?php echo $data['id_bidang'] ?>" required>
                            <div class="form-group">
                                <label for="nama_bidang">Nama Bidang</label>
                                <input type="text" class="form-control" name="nama_bidang" value="<?php echo $data['nama_bidang'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" value="<?php echo $data['lokasi'] ?>" required>
                            </div>
                            <br>
                            <div class="tombolbidang">
                                <a class="btn btn-danger" href="data_bidang.php">Batal</a>
                                <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                                <?php
                                if (isset($_POST["update"])) {
                                    $idbidang = $_POST["id_bidang"];
                                    $namabidang = $_POST["nama_bidang"];
                                    $lokasi =  $_POST["lokasi"];

                                    $update = "UPDATE tb_bidang SET id_bidang='$idbidang', nama_bidang='$namabidang', lokasi='$lokasi' WHERE id_bidang='$idbidang'";

                                    $qupdate = mysqli_query($koneksi, $update);

                                    if ($qupdate) {
                                        echo "<script>window.location.href = 'data_bidang.php';</script>";
                                    } else {
                                        mysqli_error($koneksi);
                                    }
                                }

                                mysqli_close($koneksi);
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
            <span> <i>2. Apabila ingin merubah <b>ID BIDANG</b> harus menghapusnya terlebih dahulu dan menginputkan kembali </i></span>
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

    .keteranganeditkategori {
        font-style: italic;
        margin-top: 15px;
        text-transform: lowercase;
        color: grey;
        margin-left: 40px;
    }
</style>