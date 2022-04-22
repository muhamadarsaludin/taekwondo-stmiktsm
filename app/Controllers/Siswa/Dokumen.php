<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use CodeIgniter\Validation\Rules;

class Dokumen extends BaseController
{
  protected $dokumenModel;

  public function __construct()
  {
    $this->dokumenModel = new DokumenModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Dokumen Pendukung | PPDB SMK As-Saabiq',
      'validation' => \Config\Services::validation(),
      'document' => @$this->dokumenModel->where('user_id', user_id())->findAll()[0],
    ];
    return view('dashboard/siswa/dokumen/index', $data);
  }

  public function save()
  {
    $data = [];
    $dokumen = @$this->dokumenModel->where('user_id', user_id())->findAll()[0];

    $rules = [
      'foto' => 'max_size[documents.foto,5024]|ext_in[documents.foto,png,jpg,jpeg,pdf]',
      'kartu_nisn' => 'max_size[documents.kartu_nisn,5024]|ext_in[documents.kartu_nisn,png,jpg,jpeg,pdf]',
      'rapor' => 'max_size[documents.rapor,5024]|ext_in[documents.rapor,png,jpg,jpeg,pdf]',
      'ijazah' => 'max_size[documents.ijazah,5024]|ext_in[documents.ijazah,png,jpg,jpeg,pdf]',
      'kk' => 'max_size[documents.kk,5024]|ext_in[documents.kk,png,jpg,jpeg,pdf]',
    ];

    if (!$dokumen) {
      foreach ($rules as $key => $value) {
        $rules[$key] = $value . "|uploaded[documents.$key]";
      }
    } else {
      $data['id'] = $dokumen['id'];
    }

    if (!$this->validate($rules)) {
      return redirect()->to('/siswa/dokumen')->withInput()->with('errors', $this->validator->getErrors());
    }


    if ($imagefile = $this->request->getFiles()) {
      foreach ($imagefile['documents'] as $key => $img) {
        if ($img->isValid() && !$img->hasMoved()) {
          $data[$key] = $img->getRandomName();
          $path = ($img->getClientExtension() == 'pdf') ? 'doc' : 'img';
          if ($dokumen) if ($dokumen[$key] !== $data[$key]) unlink("$path/$key/$dokumen[$key]");
          $img->move("$path/" . $key, $data[$key]);
        }
      }
    }
    $data['user_id'] = user_id();

    if (($dokumen && count($data) > 2) || !$dokumen) {
      $this->dokumenModel->save($data);
      session()->setFlashdata('message', 'Dokumen berhasil diperbaharui!');
    }

    return redirect()->to('/siswa/dokumen');
  }
}
