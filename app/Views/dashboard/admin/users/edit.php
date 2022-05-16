<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Edit User</h3>
  </div>

  <form action="/admin/users/update/<?= $user['id']; ?>" method="post" class="user">
    <?= csrf_field(); ?>
    <?= $validation->listErrors(); ?>
    <div class="form-group row">
      <label for="role" class="col-sm-2 col-form-label">Role<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <select class="form-control" id="role" name="role">
          <option>Pilih Role</option>
          <option value="ADMIN" <?= $user['role'] == 'ADMIN' ? 'selected':''; ?>>ADMIN</option>
          <option value="STUDENT" <?= $user['role'] == 'STUDENT' ? 'selected':''; ?>>STUDENT</option>
        </select>
        <div class="invalid-feedback">
          <?= session('errors.role') ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="aktif" class="col-sm-2 col-form-label">Status<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <select class="form-control" id="aktif" name="aktif">
          <option value="1" <?= $user['aktif']? 'selected':''; ?>>Aktif</option>
          <option value="0" <?= $user['aktif']? '':'selected'; ?>>Disable</option>
        </select>
        <div class="invalid-feedback">
          <?= session('errors.aktif') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Alamat Email<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <input type="email" class="form-control form-control-user <?= (session('errors.email') ? 'is-invalid' : ''); ?>" id="email" name="email" placeholder="Alamat email..." value="<?= (old('email')) ? old('email') : $user['email']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('email'); ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="username" class="col-sm-2 col-form-label">Username<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?= (session('errors.username') ? 'is-invalid' : ''); ?>" id="username" name="username" placeholder="Username..." value="<?= (old('username')) ? old('username') : $user['username']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('username'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Password<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <i class="visible fas fa-eye-slash"></i>
        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" placeholder="Password" autocomplete="off" value="<?= (old('password')) ? old('password') : $user['password']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('password'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= (old('nama')) ? old('nama') : $user['nama']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('nama'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="tingkat" class="col-sm-2 col-form-label">Tingkatan<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <select class="form-control" id="tingkat" name="tingkat">
          <option>Pilih Tingkat</option>
          <option value="GEUP 10" <?= $user['tingkat'] == 'GEUP 10' ? 'selected':''; ?>>GEUP 10</option>
          <option value="GEUP 9" <?= $user['tingkat'] == 'GEUP 9' ? 'selected':''; ?>>GEUP 9</option>
          <option value="GEUP 8" <?= $user['tingkat'] == 'GEUP 8' ? 'selected':''; ?>>GEUP 8</option>
          <option value="GEUP 7" <?= $user['tingkat'] == 'GEUP 7' ? 'selected':''; ?>>GEUP 7</option>
          <option value="GEUP 6" <?= $user['tingkat'] == 'GEUP 6' ? 'selected':''; ?>>GEUP 6</option>
          <option value="GEUP 5" <?= $user['tingkat'] == 'GEUP 5' ? 'selected':''; ?>>GEUP 5</option>
          <option value="GEUP 4" <?= $user['tingkat'] == 'GEUP 4' ? 'selected':''; ?>>GEUP 4</option>
          <option value="GEUP 3" <?= $user['tingkat'] == 'GEUP 3' ? 'selected':''; ?>>GEUP 3</option>
          <option value="GEUP 2" <?= $user['tingkat'] == 'GEUP 2' ? 'selected':''; ?>>GEUP 2</option>
          <option value="GEUP 1" <?= $user['tingkat'] == 'GEUP 1' ? 'selected':''; ?>>GEUP 1</option>
          <option value="POOM 1" <?= $user['tingkat'] == 'POOM 1' ? 'selected':''; ?>>POOM 1</option>
          <option value="POOM 2" <?= $user['tingkat'] == 'POOM 2' ? 'selected':''; ?>>POOM 2</option>
          <option value="POOM 3" <?= $user['tingkat'] == 'POOM 3' ? 'selected':''; ?>>POOM 3</option>
          <option value="DAN 1" <?= $user['tingkat'] == 'DAN 1' ? 'selected':''; ?>>DAN 1</option>
          <option value="DAN 2" <?= $user['tingkat'] == 'DAN 2' ? 'selected':''; ?>>DAN 2</option>
          <option value="DAN 3" <?= $user['tingkat'] == 'DAN 3' ? 'selected':''; ?>>DAN 3</option>
          <option value="DAN 4" <?= $user['tingkat'] == 'DAN 4' ? 'selected':''; ?>>DAN 4</option>
          <option value="DAN 5" <?= $user['tingkat'] == 'DAN 5' ? 'selected':''; ?>>DAN 5</option>
          <option value="DAN 6" <?= $user['tingkat'] == 'DAN 6' ? 'selected':''; ?>>DAN 6</option>
          <option value="DAN 7" <?= $user['tingkat'] == 'DAN 7' ? 'selected':''; ?>>DAN 7</option>
          <option value="DAN 8" <?= $user['tingkat'] == 'DAN 8' ? 'selected':''; ?>>DAN 8</option>
          <option value="DAN 9" <?= $user['tingkat'] == 'DAN 9' ? 'selected':''; ?>>DAN 9</option>
        </select>
        <div class="invalid-feedback">
          <?= $validation->getError('tingkat'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="rentang_umur" class="col-sm-2 col-form-label">Rentang Umur<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <select class="form-control" id="rentang_umur" name="rentang_umur">
          <option>Rentang umur</option>
          <option value="Pra Cadet A (SD Kelas 1-3)" <?= $user['rentang_umur'] == 'Pra Cadet A (SD Kelas 1-3)' ? 'selected':''; ?> >Pra Cadet A (SD Kelas 1-3)</option>
          <option value="Pra Cadet B (SD Kelas 4-6)" <?= $user['rentang_umur'] == 'Pra Cadet B (SD Kelas 4-6)' ? 'selected':''; ?>>Pra Cadet B (SD Kelas 4-6)</option>
          <option value="Cadet (SMP)" <?= $user['rentang_umur'] == 'Cadet (SMP)' ? 'selected':''; ?>>Cadet (SMP)</option>
          <option value="Junior (SMA Max 16 Tahun)" <?= $user['rentang_umur'] == 'Junior (SMA Max 16 Tahun)' ? 'selected':''; ?>>Junior (SMA Max 16 Tahun)</option>
          <option value="Senior (SMA Min 17 Tahun)" <?= $user['rentang_umur'] == 'Senior (SMA Min 17 Tahun)' ? 'selected':''; ?>>Senior (SMA Min 17 Tahun)</option>
        </select>
        <div class="invalid-feedback">
          <?= $validation->getError('username'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
      <input type="text" class="form-control form-control-user <?php if (session('errors.tempat_lahir')) : ?>is-invalid<?php endif ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir" value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $user['tempat_lahir']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('tempat_lahir'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
      <input type="date" class="form-control form-control-user <?php if (session('errors.tanggal_lahir')) : ?>is-invalid<?php endif ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal lahir" value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : date_format(date_create($user['tanggal_lahir']), 'Y-m-d'); ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('tanggal_lahir'); ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
          <option>Jenis Kelamin</option>
          <option value="Laki-laki" <?= $user['jenis_kelamin'] == 'Laki-laki' ? 'selected':''; ?>>Laki-laki</option>
          <option value="Perempuan" <?= $user['jenis_kelamin'] == 'Perempuan' ? 'selected':''; ?>>Perempuan</option>
        </select>
        <div class="invalid-feedback">
          <?= session('errors.jenis_kelamin') ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="agama" class="col-sm-2 col-form-label">Agama<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <select class="form-control" id="agama" name="agama">
          <option>agama</option>
          <option value="Islam" <?= $user['agama'] == 'Islam' ? 'selected':''; ?>>Islam</option>
          <option value="Kristen" <?= $user['agama'] == 'Kristen' ? 'selected':''; ?>>Kristen</option>
          <option value="Hindu" <?= $user['agama'] == 'Hindu' ? 'selected':''; ?>>Hindu</option>
          <option value="Buddha" <?= $user['agama'] == 'Buddha' ? 'selected':''; ?>>Buddha</option>
          <option value="Konghucu" <?= $user['agama'] == 'Konghucu' ? 'selected':''; ?>>Konghucu</option>
        </select>
        <div class="invalid-feedback">
          <?= session('errors.agama') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="kontak" class="col-sm-2 col-form-label">Kontak<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?php if (session('errors.kontak')) : ?>is-invalid<?php endif ?>" id="kontak" name="kontak" placeholder="Nomor Kontak" value="<?= (old('kontak')) ? old('kontak') : $user['kontak']; ?>">
        <div class="invalid-feedback">
          <?= session('errors.kontak') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="alamat" class="col-sm-2 col-form-label">Alamat<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= (old('alamat')) ? old('alamat') : $user['alamat']; ?></textarea>
        <div class="invalid-feedback">
          <?= session('errors.alamat') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="nama_ortu" class="col-sm-2 col-form-label">Nama Orang Tua<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?php if (session('errors.nama_ortu')) : ?>is-invalid<?php endif ?>" id="nama_ortu" name="nama_ortu" placeholder="Nama orang tua" value="<?= (old('nama_ortu')) ? old('nama_ortu') : $user['nama_ortu']; ?>">
        <div class="invalid-feedback">
          <?= session('errors.nama_ortu') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="kontak_ortu" class="col-sm-2 col-form-label">Kontak Orang Tua<sup class="text-danger font-weight-bold">*</sup></label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-user <?php if (session('errors.kontak_ortu')) : ?>is-invalid<?php endif ?>" id="kontak_ortu" name="kontak_ortu" placeholder="Nomor kontak orang tua" value="<?= (old('kontak_ortu')) ? old('kontak_ortu') : $user['kontak_ortu']; ?>">
        <div class="invalid-feedback">
          <?= session('errors.kontak_ortu') ?>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-warning btn-user btn-sm">Save</button>
    <a href="/admin/users" class="btn btn-secondary btn-user btn-sm">Cancel</a>
  </form>
</section>
<?= $this->endSection(); ?>