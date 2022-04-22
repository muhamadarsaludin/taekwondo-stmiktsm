<?php

namespace App\Models;

use CodeIgniter\Model;

class JalurRegistrasiModel extends Model
{
  protected $table = 'jalur_registrasi';
  protected $allowedFields = ['nama_jalur', 'deskripsi'];
}
