<?php

namespace App\Models;

use CodeIgniter\Model;

class OrtuModel extends Model
{
  protected $table = 'data_ortu';
  protected $allowedFields = ['user_id', 'kondisi_keluarga', 'nama_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'nama_wali', 'pekerjaan_wali', 'penghasilan_wali'];
}
