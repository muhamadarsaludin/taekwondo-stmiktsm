<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Registasi</h3>
  </div>

  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
  <div class="flash-data-error" data-flashdata="<?= session()->getFlashdata('message-error'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('message-error')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= session()->getFlashdata('message-error'); ?>
    </div>
  <?php endif; ?>


  <form action="/siswa/registrasi/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= ($registrasi) ? $registrasi['id'] : ''; ?>">
    <?php if (registered()) : ?>
      <div class="form-group row">
        <label for="nomor-registrasi" class="col-3 col-form-label">Nomor Registrasi</label>
        <div class="col-9">
          <input type="text" class="form-control form-control-user <?= session('errors.nomor-registrasi') ? 'is-invalid' : ''; ?>" id="nomor-registrasi" name="nomor-registrasi" value="<?= ($registrasi) ? $registrasi['nomor_registrasi'] : ''; ?>" readonly>
          <div class="invalid-feedback">
            <?= $validation->getError('nomor-registrasi'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="form-group row">
      <label for="email" class="col-3 col-form-label">Email</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= (session('errors.email') ? 'is-invalid' : ''); ?>" id="email" name="email" value="<?= info_user()->email; ?>" readonly>
        <div class="invalid-feedback">
          <?= $validation->getError('email'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="tahun" class="col-3 col-form-label">Tahun Akademik</label>
      <div class="col-9">
        <input type="hidden" class="form-control form-control-user <?= (session('errors.tahun') ? 'is-invalid' : ''); ?>" id="tahun" name="tahun" value="<?= ($registrasi) ? $registrasi['tahun_id'] : $tahun['id']; ?>">
        <input type="text" class="form-control form-control-user <?= (session('errors.show') ? 'is-invalid' : ''); ?>" id="show" name="show" value="<?= ($registrasi) ? $registrasi['tahun'] : $tahun['tahun']; ?>" readonly>
        <div class="invalid-feedback">
          <?= $validation->getError('tahun'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="jalur" class="col-3 col-form-label">Jalur Registrasi</label>
      <div class="col-9">
        <select class="custom-select" id="jalur" name="jalur" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected>Pilih salah satu...</option>
          <?php foreach ($jalur as $j) : ?>
            <option <?= ($registrasi && $registrasi['jalur_id'] == $j['id']) ? 'selected' : ''; ?> value="<?= $j['id']; ?>"><?= $j['nama_jalur']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="jurusan" class="col-3 col-form-label">Pilih Jurusan</label>
      <div class="col-9">
        <select class="custom-select" id="jurusan" name="jurusan" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected>Pilih salah satu...</option>
          <?php foreach ($jurusan as $j) : ?>
            <option <?= ($registrasi && $registrasi['jurusan_id'] == $j['id']) ? 'selected' : ''; ?> value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <?php if (!registered()) : ?>
      <button type="submit" class="btn btn-warning btn-user btn-sm">Submit</button>
    <?php endif; ?>
  </form>

  <?php if (!deadline() && registered()) : ?>
    <form action="/siswa/registrasi/<?= ($registrasi) ? $registrasi['id'] : ''; ?>" method="POST" class="d-inline form-delete">
      <?= csrf_field(); ?>
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-danger btn-cencel"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline"><i class="fas fa-exclamation-triangle"></i> Batalkan Registrasi</span></span></button>
    </form>
  <?php endif; ?>
</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  $(document).ready(function() {
    $('#dataUsers').DataTable();
  });
</script>
<?= $this->endSection(); ?>