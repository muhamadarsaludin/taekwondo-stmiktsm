<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\PrestasiModel;

class Prestasi extends BaseController
{
  protected $prestasiModel;

  public function __construct()
  {
    $this->prestasiModel = new PrestasiModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Data Prestasi | PPDB SMK As-Saabiq',
      'awards' => $this->prestasiModel->getAwardsByUserId(user_info()->user_id),
    ];
    return view('dashboard/siswa/prestasi/index', $data);
  }

  public function add()
  {
    $data = [
      'title'  => 'Tambah Prestasi | PPDB SMK As-Saabiq',
      'active' => 'siswa-prestasi',
      'validation' => \Config\Services::validation(),
    ];

    return view('dashboard/siswa/prestasi/add', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'nama_prestasi' => 'required',
      'peringkat' => 'required',
      'tingkat' => 'required',
      'penyelenggara' => 'required',
      'tahun' => 'required|valid_date[Y]',
      'sertifikat' => 'uploaded[sertifikat]|max_size[sertifikat,5024]|ext_in[sertifikat,pdf]',
    ])) {
      return redirect()->to('/siswa/prestasi/add')->withInput()->with('errors', $this->validator->getErrors());
    }

    $sertifikat = $this->request->getFile('sertifikat');

    $sertifikatName = $sertifikat->getRandomName();
    $sertifikat->move('doc/siswa/sertifikat', $sertifikatName);

    $this->prestasiModel->save([
      'nama_prestasi' => $this->request->getPost('nama_prestasi'),
      'peringkat' => $this->request->getPost('peringkat'),
      'tingkat' => $this->request->getPost('tingkat'),
      'penyelenggara' => $this->request->getPost('penyelenggara'),
      'tahun' => $this->request->getPost('tahun'),
      'file_sertifikat' => $sertifikatName,
      'user_id' => user_info()->user_id,
    ]);

    session()->setFlashdata('message', 'Data prestasi berhasil ditambahkan!');
    return redirect()->to('/siswa/prestasi');
  }

  public function edit($id)
  {
    $data = [
      'title'  => 'Tambah Prestasi | PPDB SMK As-Saabiq',
      'active' => 'siswa-prestasi',
      'validation' => \Config\Services::validation(),
      'award' => $this->prestasiModel->find($id)
    ];

    return view('dashboard/siswa/prestasi/edit', $data);
  }

  public function update()
  {
    $id = $this->request->getPost('id');

    if (!$this->validate([
      'nama_prestasi' => 'required',
      'peringkat' => 'required',
      'tingkat' => 'required',
      'penyelenggara' => 'required',
      'tahun' => 'required|valid_date[Y]',
      'sertifikat' => 'max_size[sertifikat,5024]|ext_in[sertifikat,pdf]',
    ])) {
      return redirect()->to('/siswa/prestasi/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    }

    $sertifikatName = $this->request->getPost('old_file');

    $sertifikat = $this->request->getFile('sertifikat');

    if (!($sertifikat->getError() === 4)) {
      unlink('doc/siswa/sertifikat/' . $sertifikatName);
      $sertifikatName = $sertifikat->getRandomName();
      $sertifikat->move('doc/sertifikat', $sertifikatName);
    }

    $data = [
      'nama_prestasi' => $this->request->getPost('nama_prestasi'),
      'peringkat' => $this->request->getPost('peringkat'),
      'tingkat' => $this->request->getPost('tingkat'),
      'penyelenggara' => $this->request->getPost('penyelenggara'),
      'tahun' => $this->request->getPost('tahun'),
      'file_sertifikat' => $sertifikatName,
      'user_id' => user_info()->user_id,
    ];

    $this->prestasiModel->update($id, [
      'nama_prestasi' => $this->request->getPost('nama_prestasi'),
      'peringkat' => $this->request->getPost('peringkat'),
      'tingkat' => $this->request->getPost('tingkat'),
      'penyelenggara' => $this->request->getPost('penyelenggara'),
      'tahun' => $this->request->getPost('tahun'),
      'file_sertifikat' => $sertifikatName,
      'user_id' => user_info()->user_id,
    ]);

    session()->setFlashdata('message', 'Data prestasi berhasil diubah!');
    return redirect()->to('/siswa/prestasi');
  }

  public function delete($id)
  {
    $award = $this->prestasiModel->find($id);
    $file = 'doc/siswa/sertifikat/' . $award['file_sertifikat'];

    if (file_exists($file)) unlink($file);

    $this->prestasiModel->delete($id);
    session()->setFlashdata('message', 'Data prestasi berhasil dihapus!');
    return redirect()->to('/siswa/prestasi');
  }
}
