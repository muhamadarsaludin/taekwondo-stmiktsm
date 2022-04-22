<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JurusanModel;

class Jurusan extends BaseController
{
  protected $jurusanModel;


  public function __construct()
  {
    $this->jurusanModel = new JurusanModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Jurusan | PPDB SMK As-Saabiq',
      'active' => 'admin-jurusan',
      'jurusan' => $this->jurusanModel->get()->getResultArray(),
    ];
    return view('dashboard/admin/jurusan/index', $data);
  }


  // detail
  public function detail($id)
  {
    $data = [
      'title'  => 'Detail Jurusan | PPDB SMK As-Saabiq',
      'active' => 'admin-jurusan',
      'jurusan' => $this->jurusanModel->getWhere(['id' => $id])->getRowArray(),
    ];
    // dd($data);
    return view('dashboard/admin/jurusan/detail', $data);
  }

  // Add Data
  public function add()
  {
    $data = [
      'title'  => 'Tambah Jurusan | PPDB SMK As-Saabiq',
      'active' => 'admin-jurusan',
      'validation' => \Config\Services::validation(),
    ];
    return view('dashboard/admin/jurusan/add', $data);
  }
  public function save()
  {
    if (!$this->validate([
      'nama' => 'required',
      'kode' => 'required'
    ])) {
      return redirect()->to('/admin/jurusan/add')->withInput()->with('errors', $this->validator->getErrors());
    }
    $this->jurusanModel->save([
      'nama_jurusan' => $this->request->getVar('nama'),
      'kode' => strtoupper($this->request->getVar('kode')),
      'deskripsi' => $this->request->getVar('deskripsi'),
    ]);
    session()->setFlashdata('message', 'Jurusan baru berhasil ditambahkan!');
    return redirect()->to('/admin/jurusan');
  }


  // Edit data
  public function edit($id)
  {
    $data = [
      'title'  => 'Edit Jurusan | PPDB SMK As-Saabiq',
      'active' => 'admin-jurusan',
      'validation' => \Config\Services::validation(),
      'jurusan'  => $this->jurusanModel->getWhere(['id' => $id])->getRowArray(),
    ];
    return view('dashboard/admin/jurusan/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate([
      'nama' => 'required',
      'kode' => 'required',
    ])) {
      return redirect()->to('/admin/jurusan/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    }
    $this->jurusanModel->save([
      'id'    => $id,
      'nama_jurusan' => $this->request->getVar('nama'),
      'kode' => strtoupper($this->request->getVar('kode')),
      'deskripsi' => $this->request->getVar('deskripsi'),
    ]);
    session()->setFlashdata('message', 'Data jurusan berhasil diubah!');
    return redirect()->to('/admin/jurusan');
  }
  // End Edit

  // Delete jurusan
  public function delete($id)
  {
    $this->jurusanModel->delete($id);
    session()->setFlashdata('message', 'Data jurusan berhasil dihapus!');
    return redirect()->to('/admin/jurusan');
  }
}
