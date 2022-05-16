<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url("/img/logos/logo.png") ?>" width="55" class="d-inline-block align-top" alt="Logo SMK As-Saabiq">
    </div>
  </a>

  <?php if (@user_info()->role == 'ADMIN') : ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Admin
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/banner'); ?>">
        <i class="fas fa-fw fa-bullhorn"></i>
        <span>Banner Informasi</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/users'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Daftar Users</span></a>
    </li>

    <!-- Nav Tahun Akademik -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/tahun'); ?>">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Tahun Akademik</span></a>
    </li>


    <!-- Nav Item Jurusan -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/jurusan'); ?>">
        <i class="fas fa-fw fa-graduation-cap"></i>
        <span>Data Jurusan</span></a>
    </li>


    <!-- Nav Item Jalur Registrasi -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/jalur'); ?>">
        <i class="fas fa-fw fa-map-signs"></i>
        <span>Jalur Registrasi</span></a>
    </li>
    <!-- Nav Item Registrasi -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/registrasi'); ?>">
        <i class="fas fa-fw fa-address-card"></i>
        <span>Registrasi</span></a>
    </li>

  <?php else : ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Siswa
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="/siswa/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="/siswa/registrasi">
        <i class="fas fa-fw fa-address-card"></i>
        <span>Registrasi</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/siswa/identitas">
        <i class="fas fa-fw fa-user"></i>
        <span>Identitas Diri</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/siswa/ortu">
        <i class="fas fa-fw fa-users"></i>
        <span>Data Orang Tua</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/siswa/akademik">
        <i class="fas fa-fw fa-graduation-cap"></i>
        <span>Data Akademik</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/siswa/nilai">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Data Nilai</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/siswa/prestasi">
        <i class="fas fa-fw fa-trophy"></i>
        <span>Prestasi</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/siswa/dokumen">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Dokumen Pendukung</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/siswa/pengumuman">
        <i class="fas fa-2x fa-fw fa-bullhorn"></i>
        <span>Pengumuman</span></a>
    </li>
  <?php endif; ?>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0 bg-danger text-white" id="sidebarToggle"></button>
  </div>

</ul>