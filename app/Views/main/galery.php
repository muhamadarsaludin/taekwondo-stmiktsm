<?= $this->extend('templates/main'); ?>
<!-- CONTENT -->
<?= $this->section('content'); ?>
<section class="py-5">
  
    <h3 class="text-center">Galery Kegiatan.</h3>
    <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non inventore dicta, odio doloremque autem ex.</p>
    <div class="row">
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_1.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_2.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_3.jpg" alt="Card image cap">
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_4.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_5.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_6.jpg" alt="Card image cap">
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_7.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_8.jpg" alt="Card image cap">
      </div>
      <div class="col-lg-4">
          <img class="img-fluid rounded w-100" src="/img/assets/kegiatan_9.jpg" alt="Card image cap">
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