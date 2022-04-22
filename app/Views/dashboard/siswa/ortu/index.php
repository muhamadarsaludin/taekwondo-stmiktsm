<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Data Orang Tua</h3>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>

  <form action="/siswa/ortu/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= ($ortu) ? $ortu['id'] : ''; ?>">
    <div class="form-group row">
      <label for="nama-ayah" class="col-3 col-form-label">Nama Ayah</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama-ayah') ? 'is-invalid' : ''); ?>" id="nama-ayah" name="nama-ayah" value="<?= ($ortu) ? $ortu['nama_ayah'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('nama-ayah'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="pekerjaan-ayah" class="col-3 col-form-label">Pekerjaan Ayah</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('pekerjaan-ayah') ? 'is-invalid' : ''); ?>" id="pekerjaan-ayah" name="pekerjaan-ayah" value="<?= ($ortu) ? $ortu['pekerjaan_ayah'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('pekerjaan-ayah'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="penghasilan-ayah" class="col-3 col-form-label">Penghasilan Ayah</label>
      <div class="col-9">
        <select class="custom-select" id="penghasilan-ayah" name="penghasilan-ayah" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected>Pilih salah satu...</option>
          <option <?= ($ortu && $ortu['penghasilan_ayah'] == '< 3.000.000') ? 'selected' : ''; ?> value="< 3.000.000">
            < 3.000.000 </option>
          <option <?= ($ortu && $ortu['penghasilan_ayah'] == '3.000.000 - 5.000.000') ? 'selected' : ''; ?> value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
          <option <?= ($ortu && $ortu['penghasilan_ayah'] == '> 5.000.000') ? 'selected' : ''; ?> value="> 5.000.000">> 5.000.000</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="nama-ibu" class="col-3 col-form-label">Nama Ibu</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama-ibu') ? 'is-invalid' : ''); ?>" id="nama-ibu" name="nama-ibu" value="<?= ($ortu) ? $ortu['nama_ibu'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('nama-ibu'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="pekerjaan-ibu" class="col-3 col-form-label">Pekerjaan Ibu</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('pekerjaan-ibu') ? 'is-invalid' : ''); ?>" id="pekerjaan-ibu" name="pekerjaan-ibu" value="<?= ($ortu) ? $ortu['pekerjaan_ibu'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('pekerjaan-ibu'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="penghasilan-ibu" class="col-3 col-form-label">Penghasilan Ibu</label>
      <div class="col-9">
        <select class="custom-select" id="penghasilan-ibu" name="penghasilan-ibu" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected>Pilih salah satu...</option>
          <option <?= ($ortu && $ortu['penghasilan_ibu'] == '< 3.000.000') ? 'selected' : ''; ?> value="< 3.000.000">
            < 3.000.000 </option>
          <option <?= ($ortu && $ortu['penghasilan_ibu'] == '3.000.000 - 5.000.000') ? 'selected' : ''; ?> value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
          <option <?= ($ortu && $ortu['penghasilan_ibu'] == '> 5.000.000') ? 'selected' : ''; ?> value="> 5.000.000">> 5.000.000</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="nama-wali" class="col-3 col-form-label">Nama Wali</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama-wali') ? 'is-invalid' : ''); ?>" id="nama-wali" name="nama-wali" value="<?= ($ortu) ? $ortu['nama_wali'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('nama-wali'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="pekerjaan-wali" class="col-3 col-form-label">Pekerjaan Wali</label>
      <div class="col-9">
        <input type="text" class="form-control form-control-user <?= ($validation->hasError('pekerjaan-wali') ? 'is-invalid' : ''); ?>" id="pekerjaan-wali" name="pekerjaan-wali" value="<?= ($ortu) ? $ortu['pekerjaan_wali'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
        <div class="invalid-feedback">
          <?= $validation->getError('pekerjaan-wali'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="penghasilan-wali" class="col-3 col-form-label">Penghasilan Wali</label>
      <div class="col-9">
        <select class="custom-select" id="penghasilan-wali" name="penghasilan-wali" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected value="">Pilih salah satu...</option>
          <option <?= ($ortu && $ortu['penghasilan_wali'] == '< 3.000.000') ? 'selected' : ''; ?> value="< 3.000.000">
            < 3.000.000 </option>
          <option <?= ($ortu && $ortu['penghasilan_wali'] == '3.000.000 - 5.000.000') ? 'selected' : ''; ?> value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
          <option <?= ($ortu && $ortu['penghasilan_wali'] == '> 5.000.000') ? 'selected' : ''; ?> value="> 5.000.000">> 5.000.000</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="kondisi-keluarga" class="col-3 col-form-label">Kondisi Keluarga</label>
      <div class="col-9">
        <select class="custom-select" id="kondisi-keluarga" name="kondisi-keluarga" <?= (registered()) ? 'disabled' : ''; ?>>
          <option selected>Pilih salah satu...</option>
          <option <?= ($ortu && $ortu['kondisi_keluarga'] == 'Lengkap') ? 'selected' : ''; ?> value="Lengkap">Lengkap</option>
          <option <?= ($ortu && $ortu['kondisi_keluarga'] == 'Meninggal') ? 'selected' : ''; ?> value="Meninggal">Meninggal</option>
          <option <?= ($ortu && $ortu['kondisi_keluarga'] == 'Ayah Meninggal') ? 'selected' : ''; ?> value="Ayah Meninggal">Ayah Meninggal</option>
          <option <?= ($ortu && $ortu['kondisi_keluarga'] == 'Ibu Meninggal') ? 'selected' : ''; ?> value="Ibu Meninggal">Ibu Meninggal</option>
        </select>
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