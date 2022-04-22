<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\NilaiModel;


class Nilai extends BaseController
{
  protected $nilaiModel;

  public function __construct()
  {
    $this->nilaiModel = new NilaiModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Data Nilai | PPDB SMK As-Saabiq',
      'validation' => \Config\Services::validation(),
      'nilai' => @$this->nilaiModel->where('user_id', user_id())->findAll()[0]
    ];
    return view('dashboard/siswa/nilai/index', $data);
  }

  public function save()
  {
    $nilai = @$this->nilaiModel->where('user_id', user_id())->findAll()[0];

    if (!$this->validate([
      'matematika' => 'required|less_than_equal_to[100]|is_natural|integer',
      'ipa' => 'required|less_than_equal_to[100]|is_natural|integer',
      'ips' => 'required|less_than_equal_to[100]|is_natural|integer',
      'b_indo' => 'required|less_than_equal_to[100]|is_natural|integer',
      'b_inggris' => 'required|less_than_equal_to[100]|is_natural|integer',
      'pai' => 'required|less_than_equal_to[100]|is_natural|integer',
      'ppkn' => 'required|less_than_equal_to[100]|is_natural|integer',
      'pjok' => 'required|less_than_equal_to[100]|is_natural|integer',
      'b_sunda' => 'required|less_than_equal_to[100]|is_natural|integer',
    ])) {
      return redirect()->to('/siswa/nilai')->withInput()->with('errors', $this->validator->getErrors());
    }


    $data = [
      'matematika' => $this->request->getPost('matematika'),
      'ipa' => $this->request->getPost('ipa'),
      'ips' => $this->request->getPost('ips'),
      'b_indo' => $this->request->getPost('b_indo'),
      'b_inggris' => $this->request->getPost('b_inggris'),
      'pai' => $this->request->getPost('pai'),
      'ppkn' => $this->request->getPost('ppkn'),
      'pjok' => $this->request->getPost('pjok'),
      'b_sunda' => $this->request->getPost('b_sunda'),
      'user_id' => user_id()
    ];
    // dd($data);

    $nilai ? $data['id'] = $nilai->id : '';

    $this->nilaiModel->save($data);

    session()->setFlashdata('message', 'Data nilai berhasil diperbaharui!');
    return redirect()->to('/siswa/nilai');
  }
}
