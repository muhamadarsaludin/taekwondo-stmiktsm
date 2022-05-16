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
      'roles' => $this->rolesModel->get()->getResultArray()
    ];
    return view('dashboard/admin/users/add', $data);
  }
  public function save()
  {
    if (!$this->validate([
      'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
      'email'    => 'required|valid_email|is_unique[users.email]',
      'password'     => 'required|strong_password',
      'pass_confirm' => 'required|matches[password]',
    ])) {
      // dd(\Config\Services::validation()->getError('username'));
      return redirect()->to('/admin/users/add')->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->userModel->save([
      'username' => $this->request->getVar('username'),
      'email' => $this->request->getVar('email'),
      'password_hash' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      'active' => 1
    ]);

    $user = $this->userModel->getWhere(['email' => $this->request->getVar('email')])->getRowArray();


    $this->groupsUserModel->save([
      'group_id' => $this->request->getVar('role-id'),
      'user_id' => $user['id'],
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
      'roles' => $this->rolesModel->get()->getResultArray()
    ];
    // dd($data);
    return view('dashboard/admin/users/edit', $data);
  }

  public function update($id)
  {

    $user = $this->userModel->getWhere(['id' => $id])->getRowArray();
    $email = $this->request->getVar('email');
    $username = $this->request->getVar('username');

    $rules = [];

    if ($email == $user['email']) {
      $rules['email'] = 'required|valid_email';
    } else {
      $rules['email'] = 'required|valid_email|is_unique[users.email]';
    }
    if ($username == $user['username']) {
      $rules['username'] = 'required|alpha_numeric_space|min_length[3]|max_length[30]';
    } else {
      $rules['username'] = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
    }


    $pass = $this->request->getVar('password');
    if ($pass) {
      $rules['password'] = 'strong_password';
      $rules['pass_confirm'] = 'matches[password]';
      $password = password_hash($pass, PASSWORD_BCRYPT);
    } else {
      $password = $user['password_hash'];
    }


    if (!$this->validate($rules)) {
      return redirect()->to('/admin/users/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->userModel->save([
      'id' => $id,
      'username' => $username,
      'email' => $email,
      'password_hash' => $password,
      'active' => 1
    ]);

    $aguId = $this->groupsUserModel->getWhere(['user_id' => $id])->getRowArray();
    $this->groupsUserModel->save([
      'id' => $aguId,
      'group_id' => $this->request->getVar('role-id'),
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

  public function approval($id)
  {
    $user = $this->userModel->getUserById($id);
    $status = $this->request->getGetPost('status');
    if ($user) {
      $this->userModel->setActiveStatus($id, $status);
      session()->setFlashdata('message', 'User account status has changed!');
    } else {
      session()->setFlashdata('error', 'User not found!');
    }
    return redirect()->to('/admin/users');
  }
}
