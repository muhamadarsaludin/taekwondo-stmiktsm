<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\JalurRegistrasiModel;
use App\Models\RegistrasiModel;
use App\Models\TahunAkademikModel;
use App\Models\JurusanModel;

class Registrasi extends BaseController
{
  protected $jalurRegistrasiModel;
  protected $registrasiModel;
  protected $tahunAkademikModel;
  protected $jurusanModel;


  public function __construct()
  {
    $this->jalurRegistrasiModel = new JalurRegistrasiModel();
    $this->registrasiModel = new RegistrasiModel();
    $this->tahunAkademikModel = new TahunAkademikModel();
    $this->jurusanModel = new JurusanModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Registrasi | PPDB SMK As-Saabiq',
      'validation' => \Config\Services::validation(),
      'tahun' => $this->tahunAkademikModel->getWhere(['active' => 1])->getRowArray(),
      'jalur' => $this->jalurRegistrasiModel->get()->getResultArray(),
      'jurusan' => $this->jurusanModel->get()->getResultArray(),
    ];
    if (registrationOpen()) {
      $data['registrasi'] = $this->registrasiModel->getRegistrasiByUserIdAndTahunId(info_user()->id, $data['tahun']['id']);
      return view('dashboard/siswa/registrasi/index', $data);
    }
    return view('errors/not_open', $data);
  }

  public function save()
  {

    if (!$this->validate([
      'tahun' => 'required',
      'jalur' => 'required',
    ])) {
      return redirect()->to('/siswa/registrasi')->withInput()->with('errors', $this->validator->getErrors());
    }

    if (requirements_complete()) {

      $jurusan_id = $this->request->getVar('jurusan');
      $jurusan = $this->jurusanModel->getWhere(['id' => $jurusan_id])->getRowArray();
      $nomorRegistrasi = $slug = 'REG-' . $jurusan['kode'] . '-' . random_string('numeric', 8);

      $data = [
        'user_id' => info_user()->id,
        'tahun_id' => $this->request->getVar('tahun'),
        'jalur_id' => $this->request->getVar('jalur'),
        'jurusan_id' => $this->request->getVar('jurusan'),
        'nomor_registrasi' => $nomorRegistrasi,
      ];
      // dd($data);
      $this->registrasiModel->save($data);
      session()->setFlashdata('message', 'Registrasi berhasil disimpan!');
      return redirect()->to('/siswa/registrasi');
    }
    session()->setFlashdata('message-error', 'Mohon lengkapi lagi data anda!');
    return redirect()->to('/siswa/registrasi');
  }

  public function delete($id)
  {
    $this->registrasiModel->delete($id);
    session()->setFlashdata('message', 'Registrasi berhasil dibatalkan!');
    return redirect()->to('/siswa/registrasi');
  }
}
