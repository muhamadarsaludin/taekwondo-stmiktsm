<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\Model;


class Dashboard extends BaseController
{
  protected $bannerModel;


  public function __construct()
  {
    $this->bannerModel = new BannerModel();
  }
  public function index()
  {
    $db = \Config\Database::connect();
    $data = [
      'title'             => 'Dashboard | PPDB SMK As-Saabiq',
      'banners'           => $this->bannerModel->get()->getResultArray(),
      'admin'             => $db->table('users')->where('role', 'ADMIN')->countAllResults(),
      'user'              => $db->table('users')->where('role', 'STUDENT')->countAllResults(),
      'pendaftar'         => $db->table('registrasi')->countAllResults(),
      'jurusan'           => $db->table('jurusan')->countAllResults(),
      'jalur_registrasi'  => $db->table('jalur_registrasi')->countAllResults(),
      'pendaftar_diterima'    => $db->table('registrasi')->where('status', 'Diterima')->countAllResults(),
      'pendaftar_ditolak'     => $db->table('registrasi')->where('status', 'Ditolak')->countAllResults(),
    ];

    return view('dashboard/admin/index', $data);
  }
}
