<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h3 class="content-heading mb-0 text-gray-800">Detail Jalur Registrasi</h3>
    <a href="/admin/jalur/edit/<?= $jalur['id']; ?>" class="d-block d-sm-inline-block btn rounded-pill btn-warning"><i class="fas fa-plus-square mr-1"></i> Edit Jalur</a>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <form action="/admin/jalur/update/<?= $jalur['id']; ?>" method="post" class="user mt-4">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama Jalur</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Jalur..." value="<?= (old('nama')) ? old('nama') : $jalur['nama_jalur']; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" readonly><?= $jalur['deskripsi']; ?></textarea>
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