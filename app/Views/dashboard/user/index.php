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
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Jumlah Pendaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $registrasi_amount['amount']; ?> Orang</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pilihan Jurusan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jurusan_amount; ?> Jurusan</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Saya
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width:50" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Status PPDB</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Tahap</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
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
    <div class="col-lg-3 mb-4 card-menu">
      <a href="/siswa/identitas">
        <div class="card bg-purple text-light shadow py-3">
          <img class="checked-status" src="/img/checked.png" alt="">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-user"></i>
            <div class="">
              <span>Identitas Diri</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4 card-menu">
      <a href="/siswa/ortu">
        <div class="card bg-purple text-light shadow py-3">
            <img class="checked-status" src="/img/checked.png" alt="">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-users"></i>
            <div class="">
              <span>Data Orang Tua</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4 card-menu">
      <a href="/siswa/akademik">
        <div class="card bg-purple text-light shadow py-3">
            <img class="checked-status" src="/img/checked.png" alt="">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-graduation-cap"></i>
            <div class="">
              <span>Data Akademik</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4 card-menu">
      <a href="/siswa/nilai">
        <div class="card bg-purple text-light shadow py-3">
            <img class="checked-status" src="/img/checked.png" alt="">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-clipboard-list"></i>
            <div class="">
              <span>Data Nilai</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4 card-menu">
      <a href="/siswa/prestasi">
        <div class="card bg-purple text-light shadow py-3">
            <img class="checked-status" src="/img/checked.png" alt="">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-trophy"></i>
            <div class="">
              <span>Prestasi</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4 card-menu">
      <a href="/siswa/dokumen">
        <div class="card bg-purple text-light shadow py-3">
            <img class="checked-status" src="/img/checked.png" alt="">
          <div class="card-body text-center">
            <i class="fas fa-2x fa-fw fa-file-alt"></i>
            <div class="">
              <span>Dokumen Pendukung</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 mb-4 card-menu">
      <a href="/siswa/pengumuman">
        <div class="card bg-purple text-light shadow py-3">
            <img class="checked-status" src="/img/checked.png" alt="">
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