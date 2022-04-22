<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-5">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h3 class="content-heading mb-0 text-gray-800">Tahun Akademik</h3>
    <a href="/admin/tahun/add" class="d-block d-sm-inline-block btn rounded-pill btn-warning"><i class="fas fa-plus-square mr-1"></i>Tahun Akademik Baru</a>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <div class="container-fluid table-responsive">
    <table class="table table-bordered" id="dataUsers" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Tahun Akademik</th>
          <th>Status</th>
          <th>Tahap</th>
          <th>Mulai</th>
          <th>Selesai</th>
          <th>Pengumuman</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Tahun Akademik</th>
          <th>Status</th>
          <th>Tahap</th>
          <th>Mulai</th>
          <th>Selesai</th>
          <th>Pengumuman</th>
          <th>Aksi</th>
        </tr>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($tahun as $t) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $t['tahun']; ?></td>
              <td>
                <?php if ($t['active'] == 1) : ?>
                  <button class="btn btn-success btn-sm">Aktif</button>
                <?php else : ?>
                  <button class="btn btn-danger btn-sm">Non-Aktif</button>
                <?php endif; ?>
              </td>
              <td><?= $t['status']; ?></td>
              <td><?= $t['start_date']; ?></td>
              <td><?= $t['end_date']; ?></td>
              <td><?= $t['anounc_date']; ?></td>

              <td class="text-center">
                <a href="/admin/tahun/detail/<?= $t['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                <a href="/admin/tahun/edit/<?= $t['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                <form action="/admin/tahun/<?= $t['id']; ?>" method="POST" class="d-inline form-delete">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </tfoot>
      <tbody>
      </tbody>
    </table>
  </div>

</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  $(document).ready(function() {
    $('#dataUsers').DataTable();
  });
</script>
<?= $this->endSection(); ?>