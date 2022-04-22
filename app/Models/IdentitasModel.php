<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model
{
  protected $table = 'identitas_diri';
  protected $allowedFields = ['user_id', 'nama', 'no_kk', 'nik', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'anak_ke', 'jml_anak', 'agama', 'alamat'];
}
