<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\RegistrasiModel;
use App\Models\JurusanModel;
use App\Models\TahunAkademikModel;

class Dashboard extends BaseController
{
  protected $bannerModel;
  protected $registrasiModel;
  protected $jurusanModel;
  protected $tahunAkademikModel;


  public function __construct()
  {
    $this->bannerModel = new BannerModel();
    $this->registrasiModel = new RegistrasiModel();
    $this->jurusanModel = new JurusanModel();
    $this->tahunAkademikModel = new TahunAkademikModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Dashboard | PPDB SMK As-Saabiq',
      'banners' => $this->bannerModel->get()->getResultArray(),
      'registrasi_amount' => $this->registrasiModel->getAmountRegistrasiByTahun(),
      'registrasi' => $this->registrasiModel->getRegistrasiByTahunActive(),
      'tahun' => $this->tahunAkademikModel->getWhere(['active' => 1])->getRowArray(),
      'jurusan_amount' => $this->jurusanModel->countAll(),
    ];
    // dd($data);
    // dd(anouncement());
    if (registrationOpen()) {
      return view('dashboard/siswa/index', $data);
    }
    $data['error'] = 'Maaf untuk saat ini pendaftaran belum dibuka!';
    return view('errors/not_open', $data);
  }
}
