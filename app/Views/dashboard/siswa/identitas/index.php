<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Identitas Diri</h3>
  </div>

  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>

  <form action="/siswa/identitas/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= ($identitas) ? $identitas['id'] : ''; ?>">
    <div class="form-group row">
      <label for="kk" class="col-3 col-form-label">Nomor Kartu Keluarga</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= (session('errors.kk') ? 'is-invalid' : ''); ?>" id="kk" name="kk" value="<?= ($identitas) ? $identitas['no_kk'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('kk'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="nik" class="col-3 col-form-label">NIK</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= (session('errors.nik') ? 'is-invalid' : ''); ?>" id="nik" name="nik" value="<?= ($identitas) ? $identitas['nik'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('nik'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="nama" class="col-3 col-form-label">Nama Lengkap</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= (session('errors.nama') ? 'is-invalid' : ''); ?>" id="nama" name="nama" value="<?= ($identitas) ? $identitas['nama'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('nama'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="tempat-lahir" class="col-3 col-form-label">Tempat Lahir</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= (session('errors.tempat-lahir') ? 'is-invalid' : ''); ?>" id="tempat-lahir" name="tempat-lahir" value="<?= ($identitas) ? $identitas['tempat_lahir'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('tempat-lahir'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="tanggal-lahir" class="col-3 col-form-label">Tanggal Lahir</label>
      <div class="col-9">
        <input type="date" class="form-control form-control-user <?= (session('errors.tanggal-lahir') ? 'is-invalid' : ''); ?>" id="tanggal-lahir" name="tanggal-lahir" value="<?= ($identitas) ? date('Y-m-d', strtotime($identitas['tgl_lahir'])) : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('tanggal-lahir'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="jenis-kelamin" class="col-3 col-form-label">Jenis Kelamin</label>
      <div class="col-9">
        <select class="custom-select" id="jenis-kelamin" name="jenis-kelamin" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected>Pilih salah satu...</option>
          <option <?= ($identitas && $identitas['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?> value="Laki-laki">Laki-laki</option>
          <option <?= ($identitas && $identitas['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="anak-ke" class="col-3 col-form-label">Anak-Ke</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.anak-ke') ? 'is-invalid' : ''); ?>" id="anak-ke" name="anak-ke" value="<?= ($identitas) ? $identitas['anak_ke'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class=" invalid-feedback">
          <?= $validation->getError('anak-ke'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="jml-anak" class="col-3 col-form-label">Dari</label>
      <div class="col-9">
        <input type="number" class="form-control form-control-user <?= (session('errors.jml-anak') ? 'is-invalid' : ''); ?>" id="jml-anak" name="jml-anak" value="<?= ($identitas) ? $identitas['jml_anak'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class=" invalid-feedback">
          <?= $validation->getError('jml-anak'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="agama" class="col-3 col-form-label">Agama</label>
      <div class="col-9">
        <select class="custom-select" id="agama" name="agama" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected>Pilih salah satu...</option>
          <option <?= ($identitas && $identitas['agama'] == 'Islam') ? 'selected' : ''; ?> value="Islam">Islam</option>
          <option <?= ($identitas && $identitas['agama'] == 'Kristen') ? 'selected' : ''; ?> value="Kristen">Kristen</option>
          <option <?= ($identitas && $identitas['agama'] == 'Katolik') ? 'selected' : ''; ?> value="Katolik">Katolik</option>
          <option <?= ($identitas && $identitas['agama'] == 'Hindu') ? 'selected' : ''; ?> value="Hindu">Hindu</option>
          <option <?= ($identitas && $identitas['agama'] == 'Buddha') ? 'selected' : ''; ?> value="Buddha">Buddha</option>
          <option <?= ($identitas && $identitas['agama'] == 'Konghucu') ? 'selected' : ''; ?> value="Konghucu">Konghucu</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="alamat" class="col-3 col-form-label">Alamat</label>
      <div class="col-9">
        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" <?= (registered()) ? 'readonly' : ''; ?>><?= ($identitas) ? $identitas['alamat'] : ''; ?></textarea>
        <div class="invalid-feedback">
          <?= $validation->getError('alamat'); ?>
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