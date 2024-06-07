<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header('location:../logout.php');
}
include('../app/pages/header.php');
include('../conf/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<title>Diskominfo | Data Ruangan</title>
<?php
include 'aside.php';
?>

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><span style="font-weight: bold;">Ruangan |</span><span class="fw-normal"> Data Ruangan</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Ruangan</li>
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
                <h3 class="card-title"><span style="font-weight: bold;">Tabel Data Ruangan</h3>
                <a href="cetak_ruangan.php" class="btn btn-flat btn-primary float-right"><i class="fas fa-print" style="margin-right: 10px;"></i>Cetak Dokumen</a>
                <a href="tambah_ruangan.php" class="btn btn-flat btn-success float-right mr-2"><i class="fas fa-plus" style="margin-right: 10px;"></i>Tambah</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID Ruangan</th>
                      <th>Nama Ruangan</th>
                      <th>Bidang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qruangan = mysqli_query($koneksi, "SELECT * FROM tb_ruangan JOIN tb_bidang ON tb_ruangan.id_bidang=tb_bidang.id_bidang");
                    while ($ruangan = mysqli_fetch_assoc($qruangan)) {
                    ?>
                      <tr>
                        <td><?= $ruangan['id_ruangan'] ?></td>
                        <td><?= $ruangan['nama_ruangan'] ?></td>
                        <td><?= $ruangan['nama_bidang'] ?></td>

                        <td style="text-align: center;">
                          <div class="btn-group">
                            <a href="edit_ruangan.php?id_ruangan=<?= $ruangan['id_ruangan'] ?>" class="btn btn-warning">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="hapus_ruangan.php?id_ruangan=<?= $ruangan['id_ruangan'] ?>" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php
                    } ?>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include('../app/pages/footer.php'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>

</html>