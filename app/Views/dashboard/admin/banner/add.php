<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Tambah Informasi Banner</h3>
  </div>

  <form action="/admin/banner/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="image" class="col-2 col-form-label">Gambar<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-10">
        <div class="img-add w-100">
          <label for="image">
            <img src="/img/plus-circle.svg" class="main-preview icon-plus" />
          </label>
          <input id="image" name="image" type="file" class="<?= (session('errors.image') ? 'is-invalid' : ''); ?>" onchange="previewImg('image','main-preview')" />
          <div class="invalid-feedback text-center">
            <?= $validation->getError('image'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="title" class="col-sm-2 col-form-label">Judul</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('title') ? 'is-invalid' : ''); ?>" id="title" name="title" placeholder="Judul Informasi">
        <div class="invalid-feedback">
          <?= $validation->getError('title'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="link" class="col-sm-2 col-form-label">Link</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('link') ? 'is-invalid' : ''); ?>" id="link" name="link" placeholder="Link">
        <div class="invalid-feedback">
          <?= $validation->getError('link'); ?>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-warning btn-user btn-sm">Save</button>
    <a href="/admin/banner" class="btn btn-secondary btn-user btn-sm">Cancel</a>
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