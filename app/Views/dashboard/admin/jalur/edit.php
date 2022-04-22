<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Edit Jalur Registrasi</h3>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <form action="/admin/jalur/update/<?= $jalur['id']; ?>" method="post" class="user">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama jalur</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= (session('errors.nama') ? 'is-invalid' : ''); ?>" id="nama" name="nama" placeholder="Nama Jurursan" value="<?= (old('nama')) ? old('nama') : $jalur['nama_jalur']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('nama'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?= $jalur['deskripsi']; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox small">
        <input type="checkbox" class="custom-control-input" id="active" name="active" checked>
        <label class="custom-control-label" for="active">Active?</label>
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