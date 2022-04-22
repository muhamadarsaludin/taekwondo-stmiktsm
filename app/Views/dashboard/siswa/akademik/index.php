<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Data Akademik</h3>
  </div>

  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>

  <form action="/siswa/akademik/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= ($akademik) ? $akademik['id'] : ''; ?>">
    <div class="form-group row">
      <label for="asal-sekolah" class="col-3 col-form-label">Asal Sekolah</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('asal-sekolah') ? 'is-invalid' : ''); ?>" id="asal-sekolah" name="asal-sekolah" value="<?= ($akademik) ? $akademik['asal_sekolah'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('asal-sekolah'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="nisn" class="col-3 col-form-label">NISN</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nisn') ? 'is-invalid' : ''); ?>" id="nisn" name="nisn" value="<?= ($akademik) ? $akademik['nisn'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('nisn'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="nis" class="col-3 col-form-label">NIS</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nis') ? 'is-invalid' : ''); ?>" id="nis" name="nis" value="<?= ($akademik) ? $akademik['nis'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('nis'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="no-ijazah" class="col-3 col-form-label">No Ijazah</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('no-ijazah') ? 'is-invalid' : ''); ?>" id="no-ijazah" name="no-ijazah" value="<?= ($akademik) ? $akademik['no_ijazah'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('no-ijazah'); ?>
        </div>
      </div>
    </div>
    <?php if (!registered()) : ?>
      <button type="submit" class="btn btn-warning btn-user btn-sm">Simpan</button>
    <?php endif; ?>
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