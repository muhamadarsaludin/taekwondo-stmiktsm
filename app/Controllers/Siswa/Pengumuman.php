<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\RegistrasiModel;
use App\Models\JurusanModel;
use App\Models\TahunAkademikModel;

class Pengumuman extends BaseController
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
      'title' => 'Pengumuman | PPDB SMK As-Saabiq',
      'tahun' => $this->tahunAkademikModel->getWhere(['active' => 1])->getRowArray(),
    ];
    $data['registrasi'] = $this->registrasiModel->getRegistrasiByUserIdAndTahunId(user_id(), $data['tahun']['id']);

    if (anouncement()) {
      return view('dashboard/siswa/pengumuman/index', $data);
    }
    $data['error'] = 'Pengumuman PPDB akan diumumkan pada ' . date("d M Y (h:i a)", strtotime($data['tahun']['anounc_date'])) . ' saat ini masih tahap ' . $data['tahun']['status'];

    return view('errors/not_open', $data);
  }
}
