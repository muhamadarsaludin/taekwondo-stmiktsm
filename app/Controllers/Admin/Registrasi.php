<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RegistrasiModel;
use App\Models\TahunAkademikModel;
use App\Models\IdentitasModel;
use App\Models\OrtuModel;
use App\Models\AkademikModel;
use App\Models\NilaiModel;
use App\Models\PrestasiModel;
use App\Models\DokumenModel;

class Registrasi extends BaseController
{
  protected $registrasiModel;
  protected $tahunAkademikModel;
  protected $identitasModel;
  protected $ortuModel;
  protected $akademikModel;
  protected $nilaiModel;
  protected $prestasiModel;
  protected $dokumenModel;


  public function __construct()
  {
    $this->registrasiModel = new RegistrasiModel();
    $this->tahunAkademikModel = new TahunAkademikModel();
    $this->identitasModel = new IdentitasModel();
    $this->ortuModel = new ortuModel();
    $this->akademikModel = new akademikModel();
    $this->nilaiModel = new nilaiModel();
    $this->prestasiModel = new prestasiModel();
    $this->dokumenModel = new dokumenModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Registrasi | PPDB SMK As-Saabiq',
      'tahun' => $this->tahunAkademikModel->get()->getResultArray(),
      'registrasi' => $this->registrasiModel->getRegistrasiByTahunActive(),
    ];
    // dd($data);
    return view('dashboard/admin/registrasi/index', $data);
  }

  public function assessment($id)
  {
    $data = [
      'title' => 'Registrasi | PPDB SMK As-Saabiq',
      'registrasi' => $this->registrasiModel->getRegistrasiById($id),
      'validation' => \Config\Services::validation(),
    ];
    // dd($data);
    $data['identitas'] = $this->identitasModel->getWhere(['user_id' => $data['registrasi']['user_id']])->getRowArray();
    $data['ortu'] = $this->ortuModel->getWhere(['user_id' => $data['registrasi']['user_id']])->getRowArray();
    $data['akademik'] = $this->akademikModel->getWhere(['user_id' => $data['registrasi']['user_id']])->getRowArray();
    $data['nilai'] = $this->nilaiModel->getWhere(['user_id' => $data['registrasi']['user_id']])->getRow();
    $data['awards'] = $this->prestasiModel->getWhere(['user_id' => $data['registrasi']['user_id']])->getResult();
    $data['document'] = $this->dokumenModel->getWhere(['user_id' => $data['registrasi']['user_id']])->getRowArray();
    // dd($data);
    return view('dashboard/admin/registrasi/assessment', $data);
  }

  public function approve($id)
  {
    $this->registrasiModel->save([
      'id' => $id,
      'status' => 'Diterima'
    ]);
    session()->setFlashdata('message', 'Data registrasi diterima!');
    return redirect()->to('/admin/registrasi/assessment/' . $id);
  }

  public function disapprove($id)
  {
    $this->registrasiModel->save([
      'id' => $id,
      'status' => 'Ditolak'
    ]);
    session()->setFlashdata('message', 'Data registrasi ditolak!');
    return redirect()->to('/admin/registrasi/assessment/' . $id);
  }
}
