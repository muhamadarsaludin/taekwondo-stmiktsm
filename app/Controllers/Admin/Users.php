<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{

  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }


  public function index()
  {
    $data = [
      'title'  => 'Daftar User | PPDB SMK As-Saabiq',
      'active' => 'admin-users',
      'users'  => $this->userModel->getAllUsers()
    ];
    // dd($data);
    return view('dashboard/admin/users/index', $data);
  }


  // detail
  public function detail($id)
  {
    $data = [
      'title'  => 'Detail User | PPDB SMK As-Saabiq',
      'active' => 'admin-users',
      'user' => $this->userModel->getWhere(['id' => $id])->getRowArray(),
    ];
    // dd($data);
    return view('dashboard/admin/users/detail', $data);
  }

  // Add Data
  public function add()
  {
    $data = [
      'title'  => 'Tambah User | PPDB SMK As-Saabiq',
      'active' => 'admin-users',
      'validation' => \Config\Services::validation(),
    ];
    return view('dashboard/admin/users/add', $data);
  }
  public function save()
  {
    if (!$this->validate([
      'email' => 'required|is_unique[users.email]',
      'username' => 'required|is_unique[users.username]',
      'password' => 'required',
      'pass_confirm' => 'required|matches[password]',
      'nama' => 'required',
      'tingkat' => 'required',
      'rentang_umur' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required',
      'jenis_kelamin' => 'required',
      'agama' => 'required',
      'kontak' => 'required',
      'nama_ortu' => 'required',
      'kontak_ortu' => 'required',
      'role' => 'required',
      'aktif' => 'required',
    ])) {
      return redirect()->to('/admin/users/add')->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->userModel->save([
      'email' => $this->request->getPost('email', FILTER_SANITIZE_EMAIL),
      'username' => $this->request->getPost('username'),
      'password' => $this->request->getPost('password'),
      'role' =>  $this->request->getPost('role'),
      'aktif' =>  $this->request->getPost('aktif'),
      'nama' => $this->request->getPost('nama'),
      'tingkat' => $this->request->getPost('tingkat'),
      'rentang_umur' => $this->request->getPost('rentang_umur'),
      'tempat_lahir' => $this->request->getPost('tempat_lahir'),
      'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'agama' => $this->request->getPost('agama'),
      'alamat' => $this->request->getPost('alamat'),
      'kontak' => $this->request->getPost('kontak'),
      'nama_ortu' => $this->request->getPost('nama_ortu'),
      'kontak_ortu' => $this->request->getPost('kontak_ortu'),
    ]);

    session()->setFlashdata('message', 'User baru berhasil ditambahkan!');
    return redirect()->to('/admin/users');
  }
  // Edit data
  public function edit($id)
  {
    $data = [
      'title'  => 'Edit User | PPDB SMK As-Saabiq',
      'active' => 'admin-users',
      'validation' => \Config\Services::validation(),
      'user'  => $this->userModel->getUserById($id),
    ];
    return view('dashboard/admin/users/edit', $data);
  }

  public function update($id)
  {
    $user = $this->userModel->getWhere(['id' => $id])->getRowArray();
    $email = $this->request->getVar('email');
    $username = $this->request->getVar('username');
    // $rules=[];
    $rules = [
      'password' => 'required',
      'nama' => 'required',
      'tingkat' => 'required',
      'rentang_umur' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required',
      'jenis_kelamin' => 'required',
      'agama' => 'required',
      'kontak' => 'required',
      'nama_ortu' => 'required',
      'kontak_ortu' => 'required',
      'role' => 'required',
      'aktif' => 'required',
    ];

    if ($email == $user['email']) {
      $rules['email'] = 'required';
    } else {
      $rules['email'] = 'required|is_unique[users.email]';
    }
    if ($username == $user['username']) {
      $rules['username'] = 'required';
    } else {
      $rules['username'] = 'required|is_unique[users.username]';
    }


    if (!$this->validate($rules)) {
      return redirect()->to('/admin/users/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->userModel->save([
      'id' => $id,
      'email' => $this->request->getPost('email', FILTER_SANITIZE_EMAIL),
      'username' => $this->request->getPost('username'),
      'password' => $this->request->getPost('password'),
      'role' =>  $this->request->getPost('role'),
      'aktif' =>  $this->request->getPost('aktif'),
      'nama' => $this->request->getPost('nama'),
      'tingkat' => $this->request->getPost('tingkat'),
      'rentang_umur' => $this->request->getPost('rentang_umur'),
      'tempat_lahir' => $this->request->getPost('tempat_lahir'),
      'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'agama' => $this->request->getPost('agama'),
      'alamat' => $this->request->getPost('alamat'),
      'kontak' => $this->request->getPost('kontak'),
      'nama_ortu' => $this->request->getPost('nama_ortu'),
      'kontak_ortu' => $this->request->getPost('kontak_ortu'),
    ]);

    session()->setFlashdata('message', 'Data user berhasil diubah!');
    return redirect()->to('/admin/users');
  }
  // End Edit

  public function delete($id)
  {
    // cari role berdasarkan id
    $this->userModel->delete($id);
    session()->setFlashdata('message', 'User berhasil dihapus!');
    return redirect()->to('/admin/users');
  }
}
