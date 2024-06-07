<!DOCTYPE html>
<html lang="en">
<?php include ('header.php');?>
<?php include ('../../conf/config.php');?>

<title>Diskominfo | Pegawai</title>
<div class="wrapper">

  <!-- Navbar -->
  <?php include ('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <?php include ('logo.php');?>

    <!-- Sidebar -->
    <?php include ('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><span style="font-weight: bold;">Pegawai |</span><span class="fw-normal"> Data Pegawai</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Pegawai</li>
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
                <h3 class="card-title">Tabel Data Pegawai</h3>
                <a href="cetak_pegawai.php" class="btn btn-flat btn-primary float-right"><i class="fas fa-print" style="margin-right: 10px;"></i>Cetak Dokumen</a>
                <a href="tambah_pegawai.php" class="btn btn-flat btn-success float-right mr-2"><i class="fas fa-plus" style="margin-right: 10px;"></i>Tambah</a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Bidang</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qpegawai = mysqli_query($koneksi, "SELECT * FROM tb_pegawai JOIN tb_bidang ON tb_bidang.id_bidang=tb_pegawai.id_bidang");
                    while ($pegawai = mysqli_fetch_assoc($qpegawai)){
                      ?>
                      <tr>
                        <td><?= $pegawai ['nip']?></td>
                        <td><?= $pegawai ['nama_pegawai']?></td>
                        <td><?= $pegawai ['nama_bidang']?></td>
                        <td><?= $pegawai ['jabatan']?></td>
                        <td><?= $pegawai ['jenis_kelamin']?></td>
                        <td style="text-align: center;">                    
                            <div class="btn-group">
                            <a href="edit_pegawai.php?nip=<?=$pegawai ['nip']?>" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="hapus_pegawai.php?nip=<?=$pegawai ['nip']?>" class="btn btn-danger">
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
  <?php include ('footer.php');?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
