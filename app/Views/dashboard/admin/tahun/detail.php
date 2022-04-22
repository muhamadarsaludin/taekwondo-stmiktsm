<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h3 class="content-heading mb-0 text-gray-800">Detail Tahun Akademik</h3>
    <a href="/admin/tahun/edit/<?= $tahun['id']; ?>" class="d-block d-sm-inline-block btn rounded-pill btn-warning"><i class="fas fa-plus-square mr-1"></i> Edit Tahun</a>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <form action="/admin/tahun/update/<?= $tahun['id']; ?>" method="post" class="user mt-4">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun Akademik</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" id="tahun" name="tahun" placeholder="Tahun Akademik..." value="<?= (old('tahun')) ? old('tahun') : $tahun['tahun']; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="status" class="col-sm-2 col-form-label">Status Akademik</label>
      <div class="col-sm-10">
        <?php if ($tahun['active'] == 1) : ?>
          <button class="btn btn-success btn-sm">Aktif</button>
        <?php else : ?>
          <button class="btn btn-danger btn-sm">Non-Aktif</button>
        <?php endif; ?>
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