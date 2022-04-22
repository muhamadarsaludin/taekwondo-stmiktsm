<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Data Nilai</h3>
  </div>

  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>

  <form action="/siswa/nilai/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="matematika" class="col-3 col-form-label">Matematika</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.matematika') ? 'is-invalid' : ''); ?>" id="matematika" name="matematika" value="<?= ($nilai) ? $nilai->matematika : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('matematika'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="ipa" class="col-3 col-form-label">IPA</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.ipa') ? 'is-invalid' : ''); ?>" id="ipa" name="ipa" value="<?= ($nilai) ? $nilai->ipa : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('ipa'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="ips" class="col-3 col-form-label">IPS</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.ips') ? 'is-invalid' : ''); ?>" id="ips" name="ips" value="<?= ($nilai) ? $nilai->ips : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('ips'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="b_indo" class="col-3 col-form-label">Bahasa Indonesia</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.b_indo') ? 'is-invalid' : ''); ?>" id="b_indo" name="b_indo" value="<?= ($nilai) ? $nilai->b_indo : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('b_indo'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="b_inggris" class="col-3 col-form-label">Bahasa Inggris</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.b_inggris') ? 'is-invalid' : ''); ?>" id="b_inggris" name="b_inggris" value="<?= ($nilai) ? $nilai->b_inggris : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('b_inggris'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="pai" class="col-3 col-form-label">PAI</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.pai') ? 'is-invalid' : ''); ?>" id="pai" name="pai" value="<?= ($nilai) ? $nilai->pai : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('pai'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="ppkn" class="col-3 col-form-label">PPKN</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.ppkn') ? 'is-invalid' : ''); ?>" id="ppkn" name="ppkn" value="<?= ($nilai) ? $nilai->ppkn : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('ppkn'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="pjok" class="col-3 col-form-label">PJOK</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.pjok') ? 'is-invalid' : ''); ?>" id="pjok" name="pjok" value="<?= ($nilai) ? $nilai->pjok : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('pjok'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="b_sunda" class="col-3 col-form-label">Bahasa Sunda</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.b_sunda') ? 'is-invalid' : ''); ?>" id="b_sunda" name="b_sunda" value="<?= ($nilai) ? $nilai->b_sunda : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('b_sunda'); ?>
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