<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\BannerModel;


class Banner extends BaseController
{
  protected $BannerModel;


  public function __construct()
  {
    $this->bannerModel = new BannerModel();
  }

  public function index()
  {
    $data = [
      'title'  => 'Banner Informasi | PPDB SMK As-Saabiq',
      'active' => 'admin-banner',
      'banners'  => $this->bannerModel->get()->getResultArray()
    ];
    return view('dashboard/admin/banner/index', $data);
  }

  // detail
  public function detail($id)
  {
    $data = [
      'title'  => 'Detail Banner | PPDB SMK As-Saabiq',
      'active' => 'admin-banner',
      'banner' => $this->bannerModel->getWhere(['id' => $id])->getRowArray(),
    ];
    // dd($data);
    return view('dashboard/admin/banner/detail', $data);
  }



  // Add Data

  public function add()
  {
    $data = [
      'title'  => 'Buat Informasi | PPDB SMK As-Saabiq',
      'active' => 'admin-banner',
      'validation' => \Config\Services::validation(),
    ];
    return view('dashboard/admin/banner/add', $data);
  }


  public function save()
  {
    if (!$this->validate([
      'image' => [
        'rules'  => 'uploaded[image]|ext_in[image,png,jpg,jpeg,svg]',
        'errors' => [
          'ext_in' => "Extension must Image",
        ]
      ],
    ])) {
      return redirect()->to('/admin/banner/add')->withInput()->with('errors', $this->validator->getErrors());;
    }

    $image = $this->request->getFile('image');
    $image->move('img/banner');
    $imageName = $image->getName();
    $this->bannerModel->save([
      'image' => $imageName,
      'title' => $this->request->getVar('title'),
      'link' => $this->request->getVar('link'),
      'active' => 1
    ]);
    session()->setFlashdata('message', 'Banner baru berhasil ditambahkan!');
    return redirect()->to('/admin/banner');
  }
  // End add data


  // Edit data
  public function edit($id)
  {
    $data = [
      'title'  => 'Edit Banner | PPDB SMK As-Saabiq',
      'active' => 'admin-banner',
      'validation' => \Config\Services::validation(),
      'banner'  => $this->bannerModel->getWhere(['id' => $id])->getRowArray(),
    ];
    return view('dashboard/admin/banner/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate([
      'image' => [
        'rules'  => 'uploaded[image]|ext_in[image,png,jpg,jpeg,svg]',
        'errors' => [
          'ext_in' => "Extension must Image",
        ]
      ],
    ])) {
      return redirect()->to('/admin/banner/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());;
    }

    $image = $this->request->getFile('image');
    $oldImage = $this->request->getVar('old-image');
    if ($image->getError() == 4) {
      $imageName = $oldImage;
    } else {
      // pindahkan file
      $image->move('img/banner');
      $imageName = $image->getName();
      // hapus file lama
      unlink('img/banner/' . $oldImage);
    }

    $this->bannerModel->save([
      'id'    => $id,
      'image' => $imageName,
      'link' => $this->request->getVar('link'),
      'title' => $this->request->getVar('title'),
    ]);
    session()->setFlashdata('message', 'Banner berhasil diubah!');
    return redirect()->to('/admin/banner');
  }

  // End Edit

  public function delete($id)
  {
    // cari role berdasarkan id
    $banner = $this->bannerModel->getWhere(['id' => $id])->getRowArray();

    unlink('img/banner/' . $banner['image']);
    $this->bannerModel->delete($id);
    session()->setFlashdata('message', 'Banner berhasil dihapus!');
    return redirect()->to('/admin/banner');
  }
}
