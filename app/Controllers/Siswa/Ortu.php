<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\OrtuModel;

class Ortu extends BaseController
{
  protected $ortuModel;


  public function __construct()
  {
    $this->ortuModel = new OrtuModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Data Orang Tua | PPDB SMK As-Saabiq',
      'ortu' => $this->ortuModel->getWhere(['id' => info_user()->id])->getRowArray(),
      'validation' => \Config\Services::validation(),
    ];
    return view('dashboard/siswa/ortu/index', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'nama-ayah' => 'required',
      'pekerjaan-ayah' => 'required',
      'penghasilan-ayah' => 'required',
      'nama-ibu' => 'required',
      'pekerjaan-ibu' => 'required',
      'penghasilan-ibu' => 'required',
      'kondisi-keluarga' => 'required',
    ])) {
      return redirect()->to('/siswa/identitas')->withInput()->with('errors', $this->validator->getErrors());
    }
    $data = [
      'user_id' => info_user()->id,
      'nama_ayah' => $this->request->getVar('nama-ayah'),
      'pekerjaan_ayah' => $this->request->getVar('pekerjaan-ayah'),
      'penghasilan_ayah' => $this->request->getVar('penghasilan-ayah'),
      'nama_ibu' => $this->request->getVar('nama-ibu'),
      'pekerjaan_ibu' => $this->request->getVar('pekerjaan-ibu'),
      'penghasilan_ibu' => $this->request->getVar('penghasilan-ibu'),
      'nama_wali' => $this->request->getVar('nama-wali'),
      'pekerjaan_wali' => $this->request->getVar('pekerjaan-wali'),
      'penghasilan_wali' => $this->request->getVar('penghasilan-wali'),
      'kondisi_keluarga' => $this->request->getVar('kondisi-keluarga'),
    ];
    $id = $this->request->getVar('id');
    if ($id) {
      $data['id'] = $id;
    }
    // dd($data);
    $this->ortuModel->save($data);
    session()->setFlashdata('message', 'Identitas orang tua berhasil disimpan!');
    return redirect()->to('/siswa/ortu');
  }
}
