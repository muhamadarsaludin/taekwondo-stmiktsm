<?= $this->extend('templates\auth'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-0 overflow-hidden">
  <div class="row" style="min-height:100vh">
    <div class="col-6 bg-login d-none d-lg-block"></div>
    <div class="col-12 col-lg-6">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col">
          <div class="px-5">
            <div class="text-center">
              <a href="/">
                <img src="/img/logos/logo.png" alt="Logo SMK As-Saabiq" class="mb-4" width="130">
              </a>
            </div>
            <?= view('auth\_message_block') ?>
            <?= form_open('login', ['class' => 'user']); ?>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Email or username" value="<?= old('login'); ?>" autofocus>
              <div class="invalid-feedback">
                <?= session('errors.login') ?>
              </div>
            </div>

            <div class="form-group password-wrapper">
              <i class="visible fas fa-eye-slash"></i>
              <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Password">
              <div class="invalid-feedback">
                <?= session('errors.password') ?>
              </div>
            </div>

            <button type="submit" class="btn btn-warning btn-user btn-block ">
              Sign In
            </button>
            <hr>
            </form>
            <div class="text-center small">
              No account? <a class="text-warning" href="<?= route_to('register') ?>">
                Create one! </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>