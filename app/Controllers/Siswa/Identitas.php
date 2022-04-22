<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\IdentitasModel;

class Identitas extends BaseController
{
  protected $identitasModel;


  public function __construct()
  {
    $this->identitasModel = new IdentitasModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Identitas Diri | PPDB SMK As-Saabiq',
      'identitas' => $this->identitasModel->getWhere(['user_id' => info_user()->id])->getRowArray(),
      'validation' => \Config\Services::validation(),
    ];
    // dd($data);
    return view('dashboard/siswa/identitas/index', $data);
  }


  public function save()
  {
    if (!$this->validate([
      'kk' => 'required',
      'nik' => 'required',
      'nama' => 'required',
      'tempat-lahir' => 'required',
      'tanggal-lahir' => 'required',
      'jenis-kelamin' => 'required',
      'anak-ke' => 'required',
      'jml-anak' => 'required',
      'agama' => 'required',
      'alamat' => 'required',
    ])) {
      return redirect()->to('/siswa/identitas')->withInput()->with('errors', $this->validator->getErrors());
    }
    $data = [
      'user_id' => info_user()->id,
      'no_kk' => $this->request->getVar('kk'),
      'nik' => $this->request->getVar('nik'),
      'nama' => $this->request->getVar('nama'),
      'tempat_lahir' => $this->request->getVar('tempat-lahir'),
      'tgl_lahir' => $this->request->getVar('tanggal-lahir'),
      'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
      'anak_ke' => $this->request->getVar('anak-ke'),
      'jml_anak' => $this->request->getVar('jml-anak'),
      'agama' => $this->request->getVar('agama'),
      'alamat' => $this->request->getVar('alamat'),
    ];
    $id = $this->request->getVar('id');
    if ($id) {
      $data['id'] = $id;
    }

    // dd($data);
    $this->identitasModel->save($data);
    session()->setFlashdata('message', 'Identitas diri berhasil disimpan!');
    return redirect()->to('/siswa/identitas');
  }
}
