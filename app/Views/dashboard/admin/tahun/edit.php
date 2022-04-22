<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Edit Tahun Akademik</h3>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <form action="/admin/tahun/update/<?= $tahun['id']; ?>" method="post" class="user">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun Akademik</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= (session('errors.tahun') ? 'is-invalid' : ''); ?>" id="tahun" name="tahun" placeholder="Tahun Akademik" value="<?= (old('tahun')) ? old('tahun') : $tahun['tahun']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('tahun'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="status" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
        <select class="custom-select" id="status" name="status">
          <option <?= ($tahun['active'] == 1) ? 'selected' : ''; ?> value="1">Aktif</option>
          <option <?= ($tahun['active'] == 0) ? 'selected' : ''; ?> value="0">Non Aktif</option>
        </select>
      </div>
    </div>


    <button type="submit" class="btn btn-warning btn-user btn-sm">Edit</button>
    <a href="/admin/users/roles" class="btn btn-secondary btn-user btn-sm">Cancel</a>
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