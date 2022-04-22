<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>
<!-- Page Heading -->
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Tambah Prestasi</h3>
  </div>

  <form action="/siswa/prestasi" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <?= form_hidden('_method', 'PUT'); ?>
    <?= form_hidden('id', $award['id']); ?>
    <?= form_hidden('old_file', $award['file_sertifikat']); ?>
    <div class="form-group row">
      <label for="nama_prestasi" class="col-sm-2 col-form-label">Nama Prestasi</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= session('errors.nama_prestasi') ? 'is-invalid' : ''; ?>" id="nama_prestasi" name="nama_prestasi" value="<?= old('nama_prestasi') ? old('nama_prestasi') : $award['nama_prestasi']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('nama_prestasi'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="peringkat" class="col-sm-2 col-form-label">Peringkat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= session('errors.peringkat') ? 'is-invalid' : ''; ?>" id="peringkat" name="peringkat" value="<?= old('peringkat') ? old('peringkat') : $award['peringkat']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('peringkat'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="tingkat" class="col-sm-2 col-form-label">Tingkat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= session('errors.tingkat') ? 'is-invalid' : ''; ?>" id="tingkat" name="tingkat" value="<?= old('tingkat') ? old('tingkat') : $award['tingkat']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('tingkat'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="penyelenggara" class="col-sm-2 col-form-label">Penyelenggara</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= session('errors.penyelenggara') ? 'is-invalid' : ''; ?>" id="penyelenggara" name="penyelenggara" value="<?= old('penyelenggara') ? old('penyelenggara') : $award['penyelenggara']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('penyelenggara'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= session('errors.tahun') ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" value="<?= old('tahun') ? old('tahun') : $award['tahun']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('tahun'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="sertifikat" class="col-sm-2 col-form-label">Sertifikat</label>
      <div class="col-sm-10">
        <div class="custom-file">
          <input type="file" class="custom-file-input <?= session('errors.sertifikat') ? 'is-invalid' : ''; ?>" id="sertifikat" name="sertifikat">
          <label class="custom-file-label" for="sertifikat"><?= old('sertifikat') ? 'Pilih sertifikat' : $award['file_sertifikat'] ?></label>
          <div class="invalid-feedback">
            <?= $validation->getError('sertifikat'); ?>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-warning btn-user btn-sm">Save</button>
    <a href="/admin/prestasi" class="btn btn-secondary btn-user btn-sm">Cancel</a>
  </form>
</section>
<?= $this->endSection(); ?>