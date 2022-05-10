<?= $this->extend('templates\auth'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid overflow-hidden px-0">
  <div class="row" style="min-height: 100vh;">
    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
    <div class="col-lg-7 custom-overflow">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col">
          <div class="p-5">
            <div class="text-center mb-3">
              <a href="/">
                <img src="/img/logos/logo.png" alt="Logo SMK As-Saabiq" class="mb-4" width="130">
              </a>
              <h4>Formulir Pendaftaran</h4>
              <h4>Taekwondo STMIK Tasikmalaya</h4>
            </div>
            <?= view('auth\_message_block') ?>
            <?= form_open('register', ['class' => 'user']); ?>
            <div class="form-group">
              <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address" value="<?= old('email') ?>" autofocus>
              <div class="invalid-feedback">
                <?= session('errors.email') ?>
              </div>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" placeholder="Username" value="<?= old('username') ?>">
              <div class="invalid-feedback">
                <?= session('errors.username') ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-2">
                <i class="visible fas fa-eye-slash"></i>
                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" placeholder="Password" autocomplete="off">
                <div class="invalid-feedback">
                  <?= session('errors.password') ?>
                </div>
              </div>
              <div class="col-sm-6 mb-2">
                <i class="visible fas fa-eye-slash"></i>
                <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="pass_confirm" placeholder="Repeat Password" autocomplete="off">
                <div class="invalid-feedback">
                  <?= session('errors.pass_confirm') ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= old('nama') ?>">
              <div class="invalid-feedback">
                <?= session('errors.nama') ?>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" id="tingkat" name="tingkat">
                <option>Tingkatan</option>
                <option value="GEUP 10">GEUP 10</option>
                <option value="GEUP 9">GEUP 9</option>
                <option value="GEUP 8">GEUP 8</option>
                <option value="GEUP 7">GEUP 7</option>
                <option value="GEUP 6">GEUP 6</option>
                <option value="GEUP 5">GEUP 5</option>
                <option value="GEUP 4">GEUP 4</option>
                <option value="GEUP 3">GEUP 3</option>
                <option value="GEUP 2">GEUP 2</option>
                <option value="GEUP 1">GEUP 1</option>
                <option value="POOM 1">POOM 1</option>
                <option value="POOM 2">POOM 2</option>
                <option value="POOM 3">POOM 3</option>
                <option value="DAN 1">DAN 1</option>
                <option value="DAN 2">DAN 2</option>
                <option value="DAN 3">DAN 3</option>
                <option value="DAN 4">DAN 4</option>
                <option value="DAN 5">DAN 5</option>
                <option value="DAN 6">DAN 6</option>
                <option value="DAN 7">DAN 7</option>
                <option value="DAN 8">DAN 8</option>
                <option value="DAN 9">DAN 9</option>
              </select>
              <div class="invalid-feedback">
                <?= session('errors.tingkat') ?>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" id="rentang_umur" name="rentang_umur">
                <option>Rentang umur</option>
                <option value="Pra Cadet A (SD Kelas 1-3)">Pra Cadet A (SD Kelas 1-3)</option>
                <option value="Pra Cadet B (SD Kelas 4-6)">Pra Cadet B (SD Kelas 4-6)</option>
                <option value="Cadet (SMP)">Cadet (SMP)</option>
                <option value="Junior (SMA Max 16 Tahun)">Junior (SMA Max 16 Tahun)</option>
                <option value="Senior (SMA Min 17 Tahun)">Senior (SMA Min 17 Tahun)</option>
              </select>
              <div class="invalid-feedback">
                <?= session('errors.rentang_umur') ?>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.tempat_lahir')) : ?>is-invalid<?php endif ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir" value="<?= old('tempat_lahir') ?>">
              <div class="invalid-feedback">
                <?= session('errors.tempat_lahir') ?>
              </div>
            </div>
            <div class="form-group">
              <small class="form-text text-muted">Tanggal lahir</small>
              <input type="date" class="form-control form-control-user <?php if (session('errors.tanggal_lahir')) : ?>is-invalid<?php endif ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal lahir" value="<?= old('tanggal_lahir') ?>">
              <div class="invalid-feedback">
                <?= session('errors.tanggal_lahir') ?>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option>Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <div class="invalid-feedback">
                <?= session('errors.jenis_kelamin') ?>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" id="agama" name="agama">
                <option>agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
              <div class="invalid-feedback">
                <?= session('errors.agama') ?>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.kontak')) : ?>is-invalid<?php endif ?>" id="kontak" name="kontak" placeholder="Nomor Kontak" value="<?= old('kontak') ?>">
              <div class="invalid-feedback">
                <?= session('errors.kontak') ?>
              </div>
            </div>
            <div class="form-group">
            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
              <div class="invalid-feedback">
                <?= session('errors.alamat') ?>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.nama_ortu')) : ?>is-invalid<?php endif ?>" id="nama_ortu" name="nama_ortu" placeholder="Nama orang tua" value="<?= old('nama_ortu') ?>">
              <div class="invalid-feedback">
                <?= session('errors.nama_ortu') ?>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.kontak_ortu')) : ?>is-invalid<?php endif ?>" id="kontak_ortu" name="kontak_ortu" placeholder="Nomor kontak orang tua" value="<?= old('kontak_ortu') ?>">
              <div class="invalid-feedback">
                <?= session('errors.kontak_ortu') ?>
              </div>
            </div>

            <button type="submit" class="btn btn-warning btn-user btn-block">
              Register
            </button>
            <hr>
            <?= form_close(); ?>
            <p class="small text-center mt-4"> Already have an account?<a class="text-warning" href="<?= route_to('login') ?>">
                Sign In! </a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>