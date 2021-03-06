<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function login()
  {
    $data = [
      'title' => 'Sign In',
    ];
    return view('auth/login', $data);
  }

  public function login_process()
  {
    if (!$this->validate([
      'login' => 'required',
      'password' => 'required',
    ])) {
      return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
    }

    $emailOrUsername = $this->request->getPost('login');
    $password = $this->request->getPost('password');
    $user = $this->userModel->getByEmailOrUsername($emailOrUsername);

    if ($user) {
      if ($password == $user['password']) {
        if ($user['aktif'] == 0) {
          return redirect()->to('/login')->withInput()->with('error', 'Akun anda belum bisa digunakan. Cek email secara berkala untuk informasi lebih lanjut :)');
        }

        $data = [
          'user_id'          => $user['id'],
          'username'    => $user['username'],
          'email'       => $user['email'],
          'role'        => $user['role'],
          'foto'        => $user['foto'],
          'logged_in'   => true,
        ];
        session()->set('user_info', $data);

        if ($user['role'] == 'ADMIN') {
          return redirect()->to('/admin/dashboard');
        } else {
          return redirect()->to('/user/dashboard');
        }
      } else {
        $errors = [
          'password' => 'Wrong password!'
        ];
        session()->setFlashdata('errors', $errors);
        return redirect()->to('/login');
      }
    } else {
      $errors = [
        'login' => 'Email is not registered!'
      ];
      session()->setFlashdata('errors', $errors);
      return redirect()->to('/login');
    }
  }

  public function register()
  {
    $data = [
      'title' => 'Register'
    ];
    return view('auth/register', $data);
  }

  public function create_account()
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
    ])) {
      return redirect()->to('/register')->withInput()->with('errors', $this->validator->getErrors());
    }

    // $password_hash = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

    $data = [
      'email' => $this->request->getPost('email', FILTER_SANITIZE_EMAIL),
      'username' => $this->request->getPost('username'),
      'password' => $this->request->getPost('password'),
      'role' => 'STUDENT',
      'aktif' => 0,
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
    ];

    $response = sendEmail($data['email'], $data['nama'], 'You have successfully registered - Taekwondo x Codetarian', 'email/register_email');

    if ($response['status']) {
      $this->userModel->save($data);
      session()->setFlashdata('message', 'Pendaftaran akun berhasil. Cek email secara berkala untuk informasi pengaktifan akun.');
    } else {
      session()->setFlashdata('error', $response['message']);
    }

    return redirect()->to('/login');
  }

  public function logout()
  {
    if (@user_info()->logged_in) {
      session()->destroy();
    }
    return redirect()->to('login');
  }
}
