<?= $this->extend('templates/dashboard'); ?>

<?= $this->section('content'); ?>
<section class="py-3">

  <?php if ($registrasi['status'] == 'Diterima') : ?>
    <div class="alert alert-success" role="alert">
      Selamat kamu lolos seleksi!, silakan untuk melakukan daftar ulang!
    </div>
  <?php endif; ?>
  <?php if ($registrasi['status'] == 'Ditolak') : ?>
    <div class="alert alert-danger" role="alert">
      Maaf kamu tidak lolos seleksi!, Jangan menyerah coba lagi di tahun berikutnya!
    </div>
  <?php endif; ?>


  <!-- Data Registrasi -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Data Registrasi</h6>
    </div>
    <div class="card-body">
      <form action="/siswa/registrasi/save" method="post" class="user" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= ($registrasi) ? $registrasi['id'] : ''; ?>">
        <?php if (registered()) : ?>
          <div class="form-group row">
            <label for="nomor-registrasi" class="col-3 col-form-label">Nomor Registrasi</label>
            <div class="col-9">
              <input type="text" class="form-control form-control-user <?= session('errors.nomor-registrasi') ? 'is-invalid' : ''; ?>" id="nomor-registrasi" name="nomor-registrasi" value="<?= ($registrasi) ? $registrasi['nomor_registrasi'] : ''; ?>" readonly>
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if (registered()) : ?>
          <div class="form-group row">
            <label for="status" class="col-3 col-form-label">Status</label>
            <div class="col-9">
              <input type="text" class="form-control form-control-user <?= session('errors.status') ? 'is-invalid' : ''; ?>" id="status" name="status" value="<?= ($registrasi) ? $registrasi['status'] : ''; ?>" readonly>
              <div class="invalid-feedback">

              </div>
            </div>
          </div>
        <?php endif; ?>
        <div class="form-group row">
          <label for="email" class="col-3 col-form-label">Email</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.email') ? 'is-invalid' : ''); ?>" id="email" name="email" value="<?= info_user()->email; ?>" readonly>
            <div class="invalid-feedback">

            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="tahun" class="col-3 col-form-label">Tahun Akademik</label>
          <div class="col-9">
            <input type="hidden" class="form-control form-control-user <?= (session('errors.tahun') ? 'is-invalid' : ''); ?>" id="tahun" name="tahun" value="<?= ($registrasi) ? $registrasi['tahun_id'] : $tahun['id']; ?>">
            <input type="text" class="form-control form-control-user <?= (session('errors.show') ? 'is-invalid' : ''); ?>" id="show" name="show" value="<?= ($registrasi) ? $registrasi['tahun'] : $tahun['tahun']; ?>" readonly>
            <div class="invalid-feedback">

            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jalur" class="col-3 col-form-label">Jalur Registrasi</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.jalur') ? 'is-invalid' : ''); ?>" id="jalur" name="jalur" value="<?= ($registrasi) ? $registrasi['nama_jalur'] : ''; ?>" readonly>
            <div class="invalid-feedback">

            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jurusan" class="col-3 col-form-label">Jurusan</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.jurusan') ? 'is-invalid' : ''); ?>" id="jurusan" name="jurusan" value="<?= ($registrasi) ? $registrasi['nama_jurusan'] : ''; ?>" readonly>
            <div class="invalid-feedback">

            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>