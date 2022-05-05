<?php

namespace App\Controllers;

use App\Models\UserModel;

class Main extends BaseController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    $data = [
        'title'  => 'Banner Informasi | PPDB SMK As-Saabiq'
      ];
      return view('main/index', $data);
  }
  public function about()
  {
    $data = [
        'title'  => 'Banner Informasi | PPDB SMK As-Saabiq'
      ];
      return view('main/about', $data);
  }
  public function galery()
  {
    $data = [
        'title'  => 'Banner Informasi | PPDB SMK As-Saabiq'
      ];
      return view('main/galery', $data);
  }
  public function article()
  {
    $data = [
        'title'  => 'Banner Informasi | PPDB SMK As-Saabiq'
      ];
      return view('main/article', $data);
  }
}
