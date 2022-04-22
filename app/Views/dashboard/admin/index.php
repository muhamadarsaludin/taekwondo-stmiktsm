<?= $this->extend('templates/dashboard'); ?>
<?= $this->section('banner'); ?>
<!-- Banner -->
<?php if ($banners) : ?>
  <div class="container-fluid swiper-container">
    <div class="swiper-wrapper">
      <?php foreach ($banners as $banner) : ?>
        <div class="swiper-slide">
          <?php if ($banner['link']) : ?>
            <a href="<?= $banner['link']; ?>">
              <img class="banner-img shadow" src="/img/banner/<?= $banner['image']; ?>">
            </a>
          <?php else : ?>
            <img class="banner-img shadow" src="/img/banner/<?= $banner['image']; ?>">
          <?php endif ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
<?= $this->endSection(); ?>
<!-- End Banner -->
<?= $this->section('content'); ?>
<section class="py-3">
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jumlah Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $admin; ?> Admin</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-cog fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jumlah Pengguna</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user; ?> Pengguna</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jumlah Pendaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendaftar; ?> Orang</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-address-card fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pilihan Jurusan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jurusan; ?> Jurusan</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jalur Registrasi</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jalur_registrasi; ?> Jalur</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-map-signs fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pendaftar Diterima</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendaftar_diterima; ?> Orang</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check-circle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Pendaftar Ditolak</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendaftar_ditolak; ?> Orang</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-times-circle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-lg-3 mb-4">
      <a href="/siswa/registrasi">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-address-card"></i>
            <div class="">
              <span>Registrasi</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4">
      <a href="/siswa/identitas">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-user"></i>
            <div class="">
              <span>Identitas Diri</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4">
      <a href="/siswa/ortu">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-users"></i>
            <div class="">
              <span>Data Orang Tua</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4">
      <a href="/siswa/akademik">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-graduation-cap"></i>
            <div class="">
              <span>Data Akademik</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4">
      <a href="/siswa/nilai">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-clipboard-list"></i>
            <div class="">
              <span>Data Nilai</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4">
      <a href="/siswa/prestasi">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-trophy"></i>
            <div class="">
              <span>Prestasi</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4">
      <a href="/siswa/dokumen">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-file-alt"></i>
            <div class="">
              <span>Dokumen Pendukung</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4">
      <a href="/siswa/dokumen">
        <div class="card bg-purple text-light shadow py-3">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-bullhorn"></i>
            <div class="">
              <span>Pengumuman</span>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
  const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 25,
    autoplay: {
      delay: 2000,
    },
    loop: true,
  });
</script>
<?= $this->endSection(); ?>