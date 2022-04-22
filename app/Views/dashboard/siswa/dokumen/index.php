<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Dokumen Pendukung</h3>
  </div>

  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <form action="/siswa/dokumen/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group row">
      <label for="foto" class="col-3 col-form-label">Pas Foto(3*4)</label>
      <div class="col-9">
        <input type="file" class="form-control custom-file-input <?= (@session('errors')['foto']) ? 'is-invalid' : ''; ?>" id="foto" name="documents[foto]">
        <label class="custom-file-label" for="foto"><?= $document ? $document['foto'] : 'Choose file'; ?></label>
        <div class="invalid-feedback">
          <?= $validation->getError("foto"); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="kartu_nisn" class="col-3 col-form-label">Kartu NISN</label>
      <div class="col-9">
        <input type="file" class="form-control custom-file-input <?= $validation->hasError("kartu_nisn") ? 'is-invalid' : ''; ?>" id="kartu_nisn" name="documents[kartu_nisn]">
        <label class="custom-file-label" for="kartu_nisn"><?= $document ? $document['kartu_nisn'] : 'Choose file'; ?></label>
        <div class="invalid-feedback">
          <?= $validation->getError("kartu_nisn"); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="rapor" class="col-3 col-form-label">Rapor</label>
      <div class="col-9">
        <input type="file" class="form-control custom-file-input <?= $validation->hasError("rapor") ? 'is-invalid' : ''; ?>" id="rapor" name="documents[rapor]">
        <label class="custom-file-label" for="rapor"><?= $document ? $document['rapor'] : 'Choose file'; ?></label>
        <div class="invalid-feedback">
          <?= $validation->getError("rapor"); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="ijazah" class="col-3 col-form-label">Ijazah</label>
      <div class="col-9">
        <input type="file" class="form-control custom-file-input <?= ($validation->hasError("ijazah") ? 'is-invalid' : ''); ?>" id="ijazah" name="documents[ijazah]">
        <label class="custom-file-label" for="ijazah"><?= $document ? $document['ijazah'] : 'Choose file'; ?></label>
        <div class="invalid-feedback">
          <?= $validation->getError("ijazah"); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="kk" class="col-3 col-form-label">Kartu Keluarga</label>
      <div class="col-9">
        <input type="file" class="form-control custom-file-input <?= ($validation->hasError("kk") ? 'is-invalid' : ''); ?>" id="kk" name="documents[kk]">
        <label class="custom-file-label" for="kk"><?= $document ? $document['kk'] : 'Choose file'; ?></label>
        <div class="invalid-feedback">
          <?= $validation->getError("kk"); ?>
        </div>
      </div>
    </div>
    <?php if (!registered()) : ?>
      <button type="submit" class="btn btn-warning btn-user btn-sm">Simpan</button>
    <?php endif; ?>
  </form>
</section>
<?= $this->endSection(); ?>