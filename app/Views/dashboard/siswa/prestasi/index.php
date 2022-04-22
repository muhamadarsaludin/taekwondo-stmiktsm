<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>
<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h3 class="content-heading mb-0 text-gray-800">Prestasi</h3>
    <?php if (!registered()) : ?>
      <a href="/siswa/prestasi/add" class="d-block d-sm-inline-block btn rounded-pill btn-warning"><i class="fas fa-plus-square mr-1"></i>Tambah Prestasi</a>
    <?php endif; ?>
  </div>
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <div class="table-responsive">
    <table class="table table-bordered" id="dataUsers" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Prestasi</th>
          <th>Peringkat</th>
          <th>Tingkat</th>
          <th>Penyelenggara</th>
          <th>Tahun</th>
          <th>File</th>
          <?php if (!registered()) : ?>
            <th width="15%">Aksi</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($awards as $data) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data->nama_prestasi; ?></td>
            <td><?= $data->peringkat; ?></td>
            <td><?= $data->tingkat; ?></td>
            <td><?= $data->penyelenggara; ?></td>
            <td><?= $data->tahun; ?></td>
            <td><a href="/doc/sertifikat/<?= $data->file_sertifikat; ?>" target="_blank"><?= strlen($data->file_sertifikat) > 10 ? substr($data->file_sertifikat, 0, 10) . "..." : $data->file_sertifikat; ?></a></td>
            <td>
              <a href="/siswa/prestasi/edit/<?= $data->id; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
              <form action="/siswa/prestasi/<?= $data->id; ?>" method="POST" class="d-inline form-delete">
                <?= csrf_field(); ?>
                <?= form_hidden('_method', 'DELETE'); ?>
                <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Prestasi</th>
          <th>Peringkat</th>
          <th>Tingkat</th>
          <th>Penyelenggara</th>
          <th>Tahun</th>
          <th>File</th>
          <?php if (!registered()) : ?>
            <th>Aksi</th>
          <?php endif; ?>
        </tr>
        <tbody>

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