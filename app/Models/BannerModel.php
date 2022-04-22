<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    protected $allowedFields = ['image', 'title', 'link', 'active'];
}
