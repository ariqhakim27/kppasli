<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:../logout.php');
}
include('../app/pages/header.php');
include('../conf/config.php');
?>

<title>Diskominfo | Dashboard</title>
<?php
include 'aside.php';
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><span style="font-weight: bold;">Barang |</span><span class="fw-normal"> Data Barang</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
                <h3 class="card-title"><span style="font-weight: bold;">Tabel Data Barang</span></h3>
                <a href="cetak_barang.php" class="btn btn-flat btn-primary float-right"><i class="fas fa-print" style="margin-right: 10px;"></i>Cetak Dokumen</a>
                <a href="tambah_barang.php" class="btn btn-flat btn-success float-right mr-2"><i class="fas fa-plus" style="margin-right: 10px;"></i>Tambah</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Barang</th>
                      <th>Kode Barang</th>
                      <th>Merek</th>
                      <th>Nomor Seri</th>
                      <th>Ukuran</th>
                      <th>Bahan</th>
                      <th>Harga</th>
                      <th>Bidang</th>
                      <th>Ruangan</th>
                      <th>Penanggung Jawab</th>
                      <th>Tanggal Input</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qbarang = mysqli_query($koneksi, "SELECT * FROM tb_barang 
                    JOIN tb_transaksi_barang ON tb_barang.id_barang=tb_transaksi_barang.id_barang
                    JOIN tb_kategori ON tb_kategori.id_kategori=tb_transaksi_barang.id_kategori
                    JOIN tb_bidang ON tb_bidang.id_bidang=tb_transaksi_barang.id_bidang
                    JOIN tb_ruangan ON tb_ruangan.id_ruangan=tb_transaksi_barang.id_ruangan
                    JOIN tb_pegawai ON tb_pegawai.nip=tb_transaksi_barang.nip");
  
                    while ($barang = mysqli_fetch_assoc($qbarang)) {
                    ?>
                      <tr>
                        e

                        <td style="text-align: center;">
                          <div class="btn-group">
                            <a href="edit_data_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-warning">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="hapus_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="detail_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-primary">
                              <i class="fas fa-info-circle"></i>
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