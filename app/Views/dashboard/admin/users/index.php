<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h3 class="content-heading mb-0 text-gray-800">Daftar User</h3>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php endif; ?>
  <table id="data-users" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Foto Profile</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><img width="50" src="/img/users/<?= $user['foto']; ?>" alt="<?= $user['username']; ?> Image"></td>
          <td><?= $user['username']; ?></td>
          <td><?= $user['email']; ?></td>
          <td><?= $user['role']; ?></td>
          <td>
            <?php if ($user['aktif']) : ?>
              <a href="/admin/users/approval/<?= $user['id']; ?>?status=0" class="btn btn-success btn-sm small mb-1 w-100"><span class="d-sm-none d-lg-inline">Approved</span></a>
            <?php else : ?>
              <a href="/admin/users/approval/<?= $user['id']; ?>?status=1" class="btn btn-warning btn-sm small mb-1 w-100"><span class="d-sm-none d-lg-inline">Need Approval</span></a>
            <?php endif; ?>
          </td>
          <td class="text-center">
            <a href="/admin/users/detail/<?= $user['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
            <a href="/admin/users/edit/<?= $user['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
            <form action="/admin/users/<?= $user['id']; ?>" method="POST" class="d-inline form-delete">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Foto Profile</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  $(document).ready(function() {
    $('#data-users').DataTable();
  });
</script>
<?= $this->endSection(); ?>