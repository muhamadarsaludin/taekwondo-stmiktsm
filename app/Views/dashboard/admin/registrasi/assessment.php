<?= $this->extend('templates/dashboard'); ?>

<!-- End Banner -->
<?= $this->section('content'); ?>

<!-- Page Heading -->
<section class="py-3 mb-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="content-heading mb-0 text-gray-800">Assessmen Pendaftaran</h3>
  </div>

  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
  <div class="flash-data-error" data-flashdata="<?= session()->getFlashdata('message-error'); ?>"></div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('message-error')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= session()->getFlashdata('message-error'); ?>
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
                <?= $validation->getError('nomor-registrasi'); ?>
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
                <?= $validation->getError('status'); ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <div class="form-group row">
          <label for="email" class="col-3 col-form-label">Email</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.email') ? 'is-invalid' : ''); ?>" id="email" name="email" value="<?= info_user()->email; ?>" readonly>
            <div class="invalid-feedback">
              <?= $validation->getError('email'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="tahun" class="col-3 col-form-label">Tahun Akademik</label>
          <div class="col-9">
            <input type="hidden" class="form-control form-control-user <?= (session('errors.tahun') ? 'is-invalid' : ''); ?>" id="tahun" name="tahun" value="<?= ($registrasi) ? $registrasi['tahun_id'] : $tahun['id']; ?>">
            <input type="text" class="form-control form-control-user <?= (session('errors.show') ? 'is-invalid' : ''); ?>" id="show" name="show" value="<?= ($registrasi) ? $registrasi['tahun'] : $tahun['tahun']; ?>" readonly>
            <div class="invalid-feedback">
              <?= $validation->getError('tahun'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jalur" class="col-3 col-form-label">Jalur Registrasi</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.jalur') ? 'is-invalid' : ''); ?>" id="jalur" name="jalur" value="<?= ($registrasi) ? $registrasi['nama_jalur'] : ''; ?>" readonly>
            <div class="invalid-feedback">
              <?= $validation->getError('jalur'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jurusan" class="col-3 col-form-label">Jurusan</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.jurusan') ? 'is-invalid' : ''); ?>" id="jurusan" name="jurusan" value="<?= ($registrasi) ? $registrasi['nama_jurusan'] : ''; ?>" readonly>
            <div class="invalid-feedback">
              <?= $validation->getError('jurusan'); ?>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Data Identitas -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Identitas Diri</h6>
    </div>
    <div class="card-body">
      <form action="/siswa/identitas/save" method="post" class="user" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= ($identitas) ? $identitas['id'] : ''; ?>">
        <div class="form-group row">
          <label for="kk" class="col-3 col-form-label">Nomor Kartu Keluarga</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.kk') ? 'is-invalid' : ''); ?>" id="kk" name="kk" value="<?= ($identitas) ? $identitas['no_kk'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('kk'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nik" class="col-3 col-form-label">NIK</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.nik') ? 'is-invalid' : ''); ?>" id="nik" name="nik" value="<?= ($identitas) ? $identitas['nik'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('nik'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-3 col-form-label">Nama Lengkap</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.nama') ? 'is-invalid' : ''); ?>" id="nama" name="nama" value="<?= ($identitas) ? $identitas['nama'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('nama'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="tempat-lahir" class="col-3 col-form-label">Tempat Lahir</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= (session('errors.tempat-lahir') ? 'is-invalid' : ''); ?>" id="tempat-lahir" name="tempat-lahir" value="<?= ($identitas) ? $identitas['tempat_lahir'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('tempat-lahir'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="tanggal-lahir" class="col-3 col-form-label">Tanggal Lahir</label>
          <div class="col-9">
            <input type="date" class="form-control form-control-user <?= (session('errors.tanggal-lahir') ? 'is-invalid' : ''); ?>" id="tanggal-lahir" name="tanggal-lahir" value="<?= ($identitas) ? date('Y-m-d', strtotime($identitas['tgl_lahir'])) : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('tanggal-lahir'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jenis-kelamin" class="col-3 col-form-label">Jenis Kelamin</label>
          <div class="col-9">
            <select class="custom-select" id="jenis-kelamin" name="jenis-kelamin" <?= (registered()) ? 'disabled' : ''; ?>>
              <option selected>Pilih salah satu...</option>
              <option <?= ($identitas && $identitas['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?> value="Laki-laki">Laki-laki</option>
              <option <?= ($identitas && $identitas['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="anak-ke" class="col-3 col-form-label">Anak-Ke</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.anak-ke') ? 'is-invalid' : ''); ?>" id="anak-ke" name="anak-ke" value="<?= ($identitas) ? $identitas['anak_ke'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class=" invalid-feedback">
              <?= $validation->getError('anak-ke'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jml-anak" class="col-3 col-form-label">Dari</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.jml-anak') ? 'is-invalid' : ''); ?>" id="jml-anak" name="jml-anak" value="<?= ($identitas) ? $identitas['jml_anak'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class=" invalid-feedback">
              <?= $validation->getError('jml-anak'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="agama" class="col-3 col-form-label">Agama</label>
          <div class="col-9">
            <select class="custom-select" id="agama" name="agama" <?= (registered()) ? 'disabled' : ''; ?>>
              <option selected>Pilih salah satu...</option>
              <option <?= ($identitas && $identitas['agama'] == 'Islam') ? 'selected' : ''; ?> value="Islam">Islam</option>
              <option <?= ($identitas && $identitas['agama'] == 'Kristen') ? 'selected' : ''; ?> value="Kristen">Kristen</option>
              <option <?= ($identitas && $identitas['agama'] == 'Katolik') ? 'selected' : ''; ?> value="Katolik">Katolik</option>
              <option <?= ($identitas && $identitas['agama'] == 'Hindu') ? 'selected' : ''; ?> value="Hindu">Hindu</option>
              <option <?= ($identitas && $identitas['agama'] == 'Buddha') ? 'selected' : ''; ?> value="Buddha">Buddha</option>
              <option <?= ($identitas && $identitas['agama'] == 'Konghucu') ? 'selected' : ''; ?> value="Konghucu">Konghucu</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-3 col-form-label">Alamat</label>
          <div class="col-9">
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" <?= (registered()) ? 'readonly' : ''; ?>><?= ($identitas) ? $identitas['alamat'] : ''; ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('alamat'); ?>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Data Ortu -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Data Orang Tua</h6>
    </div>
    <div class="card-body">
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
    </div>
  </div>
  <!-- Data Akademik -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Data Akademik</h6>
    </div>
    <div class="card-body">
      <form action="/siswa/akademik/save" method="post" class="user" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= ($akademik) ? $akademik['id'] : ''; ?>">
        <div class="form-group row">
          <label for="asal-sekolah" class="col-3 col-form-label">Asal Sekolah</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= ($validation->hasError('asal-sekolah') ? 'is-invalid' : ''); ?>" id="asal-sekolah" name="asal-sekolah" value="<?= ($akademik) ? $akademik['asal_sekolah'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('asal-sekolah'); ?>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="nisn" class="col-3 col-form-label">NISN</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= ($validation->hasError('nisn') ? 'is-invalid' : ''); ?>" id="nisn" name="nisn" value="<?= ($akademik) ? $akademik['nisn'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('nisn'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nis" class="col-3 col-form-label">NIS</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= ($validation->hasError('nis') ? 'is-invalid' : ''); ?>" id="nis" name="nis" value="<?= ($akademik) ? $akademik['nis'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('nis'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="no-ijazah" class="col-3 col-form-label">No Ijazah</label>
          <div class="col-9">
            <input type="text" class="form-control form-control-user <?= ($validation->hasError('no-ijazah') ? 'is-invalid' : ''); ?>" id="no-ijazah" name="no-ijazah" value="<?= ($akademik) ? $akademik['no_ijazah'] : ''; ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('no-ijazah'); ?>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Data Nilai -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Data Nilai</h6>
    </div>
    <div class="card-body">
      <form action="/siswa/nilai/save" method="post" class="user" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
          <label for="matematika" class="col-3 col-form-label">Matematika</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.matematika') ? 'is-invalid' : ''); ?>" id="matematika" name="matematika" value="<?= ($nilai) ? $nilai->matematika : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('matematika'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="ipa" class="col-3 col-form-label">IPA</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.ipa') ? 'is-invalid' : ''); ?>" id="ipa" name="ipa" value="<?= ($nilai) ? $nilai->ipa : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('ipa'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="ips" class="col-3 col-form-label">IPS</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.ips') ? 'is-invalid' : ''); ?>" id="ips" name="ips" value="<?= ($nilai) ? $nilai->ips : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('ips'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="b_indo" class="col-3 col-form-label">Bahasa Indonesia</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.b_indo') ? 'is-invalid' : ''); ?>" id="b_indo" name="b_indo" value="<?= ($nilai) ? $nilai->b_indo : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('b_indo'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="b_inggris" class="col-3 col-form-label">Bahasa Inggris</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.b_inggris') ? 'is-invalid' : ''); ?>" id="b_inggris" name="b_inggris" value="<?= ($nilai) ? $nilai->b_inggris : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('b_inggris'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="pai" class="col-3 col-form-label">PAI</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.pai') ? 'is-invalid' : ''); ?>" id="pai" name="pai" value="<?= ($nilai) ? $nilai->pai : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('pai'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="ppkn" class="col-3 col-form-label">PPKN</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.ppkn') ? 'is-invalid' : ''); ?>" id="ppkn" name="ppkn" value="<?= ($nilai) ? $nilai->ppkn : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('ppkn'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="pjok" class="col-3 col-form-label">PJOK</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.pjok') ? 'is-invalid' : ''); ?>" id="pjok" name="pjok" value="<?= ($nilai) ? $nilai->pjok : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('pjok'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="b_sunda" class="col-3 col-form-label">Bahasa Sunda</label>
          <div class="col-9">
            <input type="number" class="form-control form-control-user <?= (session('errors.b_sunda') ? 'is-invalid' : ''); ?>" id="b_sunda" name="b_sunda" value="<?= ($nilai) ? $nilai->b_sunda : '' ?>" <?= (registered()) ? 'readonly' : ''; ?>>
            <div class="invalid-feedback">
              <?= $validation->getError('b_sunda'); ?>
            </div>
          </div>
        </div>
        <?php if (!registered()) : ?>
          <button type="submit" class="btn btn-warning btn-user btn-sm">Simpan</button>
        <?php endif; ?>

      </form>
    </div>
  </div>
  <!-- Data Prestasi -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Prestasi</h6>
    </div>
    <div class="card-body">
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
                <td><a class="btn btn-success" href="/doc/siswa/sertifikat/<?= $data->file_sertifikat; ?>" target="_blank">Sertifikat</a></td>
                <?php if (!registered()) : ?>
                  <td>
                    <a href="/siswa/prestasi/edit/<?= $data->id; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                    <form action="/siswa/prestasi/<?= $data->id; ?>" method="POST" class="d-inline form-delete">
                      <?= csrf_field(); ?>
                      <?= form_hidden('_method', 'DELETE'); ?>
                      <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                    </form>
                  </td>
                <?php endif; ?>
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
    </div>
  </div>
  <!-- Data Dokumen -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Dokumen Pendukung</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <form action="/siswa/dokumen/save" method="post" class="user" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <div class="form-group row">
            <label for="foto" class="col-3 col-form-label">Pas Foto(3*4)</label>
            <div class="col-3">
              <div class="img-add w-100">
                <label for="image">
                  <img src="/<?= pathinfo($document['foto'], PATHINFO_EXTENSION) == 'pdf' ? 'doc' : 'img'; ?>/foto/<?= $document['foto']; ?>" class="main-preview object-fit" />
                </label>
                <input id="image" name="image" type="file" class="<?= (session('errors.image') ? 'is-invalid' : ''); ?>" onchange="previewImg('image','main-preview')" />
                <div class="invalid-feedback text-center">
                  <?= $validation->getError('image'); ?>
                </div>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label for="kartu_nisn" class="col-3 col-form-label">Kartu NISN</label>
            <div class="col-9">
              <iframe src="/<?= pathinfo($document['kartu_nisn'], PATHINFO_EXTENSION) == 'pdf' ? 'doc' : 'img'; ?>/kartu_nisn/<?= $document['kartu_nisn']; ?>" height="400" class="w-100 preview-pdf mt-5" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" frameborder="0"></iframe>
            </div>
          </div>
          <div class="form-group row">
            <label for="rapor" class="col-3 col-form-label">Rapor</label>
            <div class="col-9">
              <iframe src="/<?= pathinfo($document['rapor'], PATHINFO_EXTENSION) == 'pdf' ? 'doc' : 'img'; ?>/rapor/<?= $document['rapor']; ?>" height="400" class="w-100 preview-pdf mt-5" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" frameborder="0"></iframe>
            </div>
          </div>
          <div class="form-group row">
            <label for="ijazah" class="col-3 col-form-label">Ijazah</label>
            <div class="col-9">
              <iframe src="/<?= pathinfo($document['ijazah'], PATHINFO_EXTENSION) == 'pdf' ? 'doc' : 'img'; ?>/ijazah/<?= $document['ijazah']; ?>" height="400" class="w-100 preview-pdf mt-5" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" frameborder="0"></iframe>
            </div>
          </div>
          <div class="form-group row">
            <label for="kk" class="col-3 col-form-label">Kartu Keluarga</label>
            <div class="col-9">
              <iframe src="/<?= pathinfo($document['kk'], PATHINFO_EXTENSION) == 'pdf' ? 'doc' : 'img'; ?>/kk/<?= $document['kk']; ?>" height="400" class="w-100 preview-pdf mt-5" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" frameborder="0"></iframe>
            </div>
          </div>
          <?php if (!registered()) : ?>
            <button type="submit" class="btn btn-warning btn-user btn-sm">Simpan</button>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
  <!-- Assessment -->
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-purple">Penilaian</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive text-right">
        <a href="/admin/registrasi/approve/<?= $registrasi['id']; ?>" class="btn btn-success d-inline-block">Terima</a>
        <a href="/admin/registrasi/disapprove/<?= $registrasi['id']; ?>" class="btn btn-secondary d-inline-block">Tolak</a>
      </div>
    </div>
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