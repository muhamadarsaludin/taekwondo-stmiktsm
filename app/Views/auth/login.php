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
            <?= form_open('login', ['class' => 'user']); ?>
            <div class="form-group">
              <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Email or username" value="<?= old('login'); ?>" autofocus>
              <div class="invalid-feedback">
                <?= session('errors.login') ?>
              </div>
            </div>

            <div class="form-group password-wrapper">
              <i class="visible fas fa-eye-slash"></i>
              <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password">
              <div class="invalid-feedback">
                <?= session('errors.password') ?>
              </div>
            </div>

            <button type="submit" class="btn btn-purple btn-user btn-block ">
              Sign In
            </button>
            <hr>
            <p class="mb-4 small text-center">You can use the account and password
              below to sign in</p>
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
            </form>
            <div class="text-center mb-2 mt-4">
              <a class="small text-body" href="<?= route_to('forgot') ?>">Forgot
                Password?</a>
            </div>
            <div class="text-center small">
              No account? <a class="text-purple" href="<?= route_to('register') ?>">
                Create one! </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>