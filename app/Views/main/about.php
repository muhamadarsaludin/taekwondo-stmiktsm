<?= $this->extend('templates/main'); ?>
<!-- CONTENT -->
<?= $this->section('content'); ?>
<section class="py-5">
  <div class="row">
    <div class="col-lg-6">
      <img src="/img/assets/3.jpg" alt="taekwondo" class="w-100 img-fluid object-fit">
    </div>
    <div class="col-lg-6">
      <h4>Tentang Taekwondo STMIK Tasikmalaya</h4>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam ad culpa omnis nulla in doloremque similique, ut quod accusantium fuga sapiente placeat a odit itaque. Nemo unde dolor doloremque quo!</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ullam incidunt labore minus explicabo expedita.</p>
    </div>
  </div>
  <section class="py-5">
    <h3 class="text-center">Visi</h3>
    <p class="text-center mb-5">Mengembangkan beladiri Taekwondo khususnya di lingkungan STMIK Tasikmalaya menjunjung tinggi sportivitas, melatih kepribadian, karakter disiplin, dan meningkatkan prestasi.</p>
    <h3 class="text-center">Misi</h3>
    <ol>
      <li>
        <p>Membangun sikap disiplin dari seluruh anggota Taekwondo</p>
      </li>
      <li>
        <p>Membangun sikap disiplin dari seluruh anggota Taekwondo</p>
      </li>
      <li>
        <p>Membangun sikap disiplin dari seluruh anggota Taekwondo</p>
      </li>
      <li>
        <p>Membangun sikap disiplin dari seluruh anggota Taekwondo</p>
      </li>
    </ol>
  </section>
  <section class="py-5">
    <h3 class="text-center">Struktur Organisasi.</h3>
    <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non inventore dicta, odio doloremque autem ex.</p>
    <img class="img-fluid rounded w-100" src="/img/assets/struktur.jpeg" alt="Card image cap">
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