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
    <h3 class="text-center">Artikel Taekwondo.</h3>
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
          <img class="card-img-top" src="/img/assets/asset (3).jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">
          <img class="card-img-top" src="/img/assets/asset (4).jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">
          <img class="card-img-top" src="/img/assets/asset (5).jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="width: 100%;">
          <img class="card-img-top" src="/img/assets/asset (6).jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="" class="btn btn-lg btn-warning">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
    </div>
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