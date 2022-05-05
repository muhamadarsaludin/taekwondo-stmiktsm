<?= $this->extend('templates\auth'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid overflow-hidden px-0">
  <div class="row" style="min-height: 100vh;">
    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
    <div class="col-lg-7">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col">
          <div class="px-5">
            <div class="text-center">
              <a href="/">
                <img src="/img/logos/logo.png" alt="Logo SMK As-Saabiq" class="mb-4" width="130">
              </a>
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
              <input type="username" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" placeholder="Username" value="<?= old('username') ?>">
              <div class="invalid-feedback">
                <?= session('errors.username') ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-2">
                <i class="visible fas fa-eye-slash"></i>
                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" placeholder="Password" autocomplete="off">
              </div>
              <div class="col-sm-6 mb-2">
                <i class="visible fas fa-eye-slash"></i>
                <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="pass_confirm" placeholder="Repeat Password" autocomplete="off">
              </div>
            </div>

            <button type="submit" class="btn btn-warning btn-user btn-block">
              Register
            </button>
            <hr>
            <p class="mb-4 small text-center">You can use the account and password
              below for registration</p>
            <div class="row">
              <div class="col-6">
                <a href="index.html" class="btn btn-google bg-light border btn-user btn-block text-body">
                  <i class="fab fa-google fa-fw"></i> Google
                </a>
              </div>
              <div class="col-6">
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Facebook
                </a>
              </div>
            </div>
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