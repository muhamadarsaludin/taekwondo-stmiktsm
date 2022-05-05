<?= $this->extend('templates/main'); ?>
<?= $this->section('banner'); ?>
<!-- Banner -->
  <div class="container-fluid swiper-container mt-4">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="banner-img biger shadow" src="/img/banner/banner.png">
        </div>
    </div>
  </div>
<?= $this->endSection(); ?>
<!-- End Banner -->
<!-- CONTENT -->
<?= $this->section('content'); ?>
<section class="py-5">
  <div class="row align-items-center">
    <div class="col-lg-7">
      <h4>Taekwondo STMIK Tasikmalaya.</h4>
      <p>Kami membuka kelas taekwondo dari kelas anak-anak hingga dewasa. Mari tingkatkan kesehatan jiwa dan raga bersama kami.</p>
      <a href="" class="btn btn-warning btn-lg">Daftar Sekarang <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="col-lg-5">
      <img src="/img/assets/1.png" alt="taekwondo" class="w-100 img-fluid object-fit">
    </div>
  </div>
  <section class="mt-5">
    <div class="row">
      <div class="col-lg-3">
        <div class="card w-100 p-4">
          <div class="row justify-content-between">
            <div class="col-4">
              <h2>
                <i class="text-primary fa-solid fa-users"></i>
              </h2>
            </div>
            <div class="col-7">
              <h3>50++</h3>
              <p>Taekwondoin</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card w-100 p-4">
          <div class="row justify-content-between">
            <div class="col-4">
              <h2>
                <i class="text-success fa-solid fa-chalkboard-user"></i>
              </h2>
            </div>
            <div class="col-7">
              <h3>5</h3>
              <p>Instruktur</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card w-100 p-4">
          <div class="row justify-content-between">
            <div class="col-4">
              <h2>
                <i class="text-warning fa-solid fa-award"></i>
              </h2>
            </div>
            <div class="col-7">
              <h3>30</h3>
              <p>Kejuaraan</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card w-100 p-4">
          <div class="row justify-content-between">
            <div class="col-4">
              <h2>
                <i class="text-danger fa-solid fa-map-location-dot"></i>
              </h2>
            </div>
            <div class="col-7">
              <h3>1</h3>
              <p>Dojang</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5">
    <h3 class="text-center">Artikel Terbaru Taekwondo STMIK Tasikmalaya.</h3>
    <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non inventore dicta, odio doloremque autem ex.</p>
    <div class="row">
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">
          <img class="card-img-top" src="/img/assets/asset (1).jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">
          <img class="card-img-top" src="/img/assets/asset (2).jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">
          <img class="card-img-top" src="/img/assets/asset (7).jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5">
    <h3 class="text-center">Dokumentasi Kegiatan Taekwondo STMIK Tasikmalaya.</h3>
    <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non inventore dicta, odio doloremque autem ex.</p>
    <div class="row">
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_1.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_2.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_3.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_4.jpg" alt="Card image cap">
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_5.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_6.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_7.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-3">
          <img class="img-fluid rounded" src="/img/assets/kegiatan_8.jpg" alt="Card image cap">
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="" class="btn btn-lg btn-warning">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </section>
</section>
<?php $this->endSection(); ?>
<!-- END CONTENT -->
<!-- SCRIPT -->
<?= $this->section('script'); ?>
<script>
//   $('.banner-container').slick({
//     slidesToShow: 1,
//     autoplay: true,
//     infinite: true,
//   });
</script>
<?= $this->endSection(); ?>