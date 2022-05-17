<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Identitas extends BaseController
{
  protected $userModel;


  public function __construct()
  {
    $this->userModel = new UserModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Identitas Diri | PPDB SMK As-Saabiq',
      'user' => $this->userModel->getUserById( @user_info()->id ),
      'validation' => \Config\Services::validation(),
    ];
    // dd($data);
    return view('dashboard/user/identitas/index', $data);
  }

  // Edit data
  public function edit()
  {
    $data = [
      'title'  => 'Edit User | PPDB SMK As-Saabiq',
      'validation' => \Config\Services::validation(),
      'user'  => $this->userModel->getUserById( @user_info()->id ),
    ];
    // dd($data);
    return view('dashboard/user/identitas/edit', $data);
  }

  public function update()
  {
    // dd('test');
    $user = $this->userModel->getUserById( @user_info()->id );
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
      return redirect()->to('/user/identitas/edit/')->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->userModel->save([
      'id' => @user_info()->id,
      'email' => $this->request->getPost('email', FILTER_SANITIZE_EMAIL),
      'username' => $this->request->getPost('username'),
      'password' => $this->request->getPost('password'),
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

    session()->setFlashdata('message', 'Identitas diri berhasil diubah!');
    return redirect()->to('/user/identitas');
  }

}
