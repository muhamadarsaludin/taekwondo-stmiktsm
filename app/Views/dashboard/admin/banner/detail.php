<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h3 class="content-heading mb-0 text-gray-800">Detail Banner</h3>
    <a href="/admin/banner/edit/<?= $banner['id']; ?>" class="d-block d-sm-inline-block btn rounded-pill btn-warning"><i class="fas fa-plus-square mr-1"></i> Edit Banner</a>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <form action="/admin/banner/update/<?= $banner['id']; ?>" method="post" class="user mt-4">
    <?= csrf_field(); ?>

    <div class="form-group row">
      <label for="image" class="col-2 col-form-label">Gambar</label>
      <div class="col-10 row justify-content-between">
        <!-- main image -->
        <div class="img-add w-100">
          <label for="image">
            <img src="/img/banner/<?= $banner['image']; ?>" class="main-preview object-fit" />
          </label>
          <input id="image" name="image" type="file" class="" onchange="previewImg('image','main-preview')" />
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="title" class="col-sm-2 col-form-label">Judul</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" id="title" name="title" placeholder="" value="<?= (old('title')) ? old('title') : $banner['title']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="link" class="col-sm-2 col-form-label">Judul</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" id="link" name="link" placeholder="" value="<?= (old('link')) ? old('link') : $banner['link']; ?>">
      </div>
    </div>
  </form>

</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  $(document).ready(function() {
    $('#dataUsers').DataTable();
  });
</script>
<?= $this->endSection(); ?>