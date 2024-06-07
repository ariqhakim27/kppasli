<div class="sidebar">

  <!-- SidebarSearch Form -->
  <div class="form-inline mt-3">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-folder-open"></i>
          <p>
            Master Data
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="data_barang.php" class="nav-link">
              <i class="fas fa-box nav-icon"></i>
              <p>Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_kategori.php" class="nav-link">
              <i class="fas fa-cube nav-icon"></i>
              <p>Kategori Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_bidang.php" class="nav-link">
              <i class="fas fa-building nav-icon"></i>
              <p>Bidang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_ruangan.php" class="nav-link">
              <i class="fas fa-desktop nav-icon"></i>
              <p>Ruangan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_pegawai.php" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Pegawai</p>
            </a>
          </li>
        </ul>
      <li class="nav-item">
        <a href="../logout.php" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Logout
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>