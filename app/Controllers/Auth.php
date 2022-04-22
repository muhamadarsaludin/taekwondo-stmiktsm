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
      if (password_verify($password, $user['password_hash'])) {
        $data = [
          'username'    => $user['username'],
          'email'       => $user['email'],
          'role'        => $user['role'],
          'user_image'  => $user['user_image'],
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
      'email' => 'required',
      'username' => 'required',
      'password' => 'required',
      'pass_confirm' => 'required|matches[password]'
    ])) {
      return redirect()->to('/register')->withInput()->with('errors', $this->validator->getErrors());
    }

    $password_hash = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

    $data = [
      'email' => $this->request->getPost('email', FILTER_SANITIZE_EMAIL),
      'username' => $this->request->getPost('username'),
      'password_hash' => $password_hash,
      'role' => 'STUDENT'
    ];

    $this->userModel->save($data);
    session()->setFlashdata('message', 'Pendaftaran akun berhasil. Silakan login');
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
