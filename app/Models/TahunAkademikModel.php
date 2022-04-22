<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunAkademikModel extends Model
{
  protected $table = 'tahun_akademik';
  protected $allowedFields = ['tahun', 'active', 'status', 'start_date', 'end_date', 'anounc_date'];
}
