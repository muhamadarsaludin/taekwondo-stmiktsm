<?php

namespace App\Models;

use CodeIgniter\Model;

class AkademikModel extends Model
{
  protected $table = 'data_akademik';
  protected $allowedFields = ['user_id', 'nisn', 'asal_sekolah', 'no_ijazah', 'nis'];
}
