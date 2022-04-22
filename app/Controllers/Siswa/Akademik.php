<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\AkademikModel;

class Akademik extends BaseController
{
  protected $akademikModel;


  public function __construct()
  {
    $this->akademikModel = new AkademikModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Data Akademik | PPDB SMK As-Saabiq',
      'akademik' => $this->akademikModel->getWhere(['user_id' => info_user()->id])->getRowArray(),
      'validation' => \Config\Services::validation(),
    ];
    return view('dashboard/siswa/akademik/index', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'nisn' => 'required',
      'nis' => 'required',
      'asal-sekolah' => 'required',
      'no-ijazah' => 'required',
    ])) {
      return redirect()->to('/siswa/akademik')->withInput()->with('errors', $this->validator->getErrors());
    }
    $data = [
      'user_id' => info_user()->id,
      'nisn' => $this->request->getVar('nisn'),
      'nis' => $this->request->getVar('nis'),
      'asal_sekolah' => $this->request->getVar('asal-sekolah'),
      'no_ijazah' => $this->request->getVar('no-ijazah'),
    ];
    $id = $this->request->getVar('id');
    if ($id) {
      $data['id'] = $id;
    }
    $this->akademikModel->save($data);
    session()->setFlashdata('message', 'Data akademik berhasil disimpan!');
    return redirect()->to('/siswa/akademik');
  }
}
