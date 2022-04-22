<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiModel extends Model
{
  protected $table = 'registrasi';
  protected $allowedFields = ['user_id', 'tahun_id', 'nomor_registrasi', 'status', 'jalur_id', 'jurusan_id'];
  protected $useTimestamps = true;


  public function getRegistrasiByUserIdAndTahunId($userId, $tahunId)
  {
    $query = "SELECT `r`.*,`t`.`tahun`,`t`.`start_date`,`t`.`end_date`,`t`.`anounc_date`,`i`.`nama`,`j`.`nama_jalur`,`ju`.`nama_jurusan`
    FROM `registrasi` AS `r`
    JOIN `tahun_akademik` AS `t`
    ON `r`.`tahun_id` = `t`.`id`
    JOIN `users` AS `u`
    ON `r`.`user_id` = `u`.`id`
    JOIN `identitas_diri` AS `i`
    ON `i`.`user_id` = `u`.`id`
    JOIN `jalur_registrasi` AS `j`
    ON `r`.`jalur_id` = `j`.`id`
    JOIN `jurusan` AS `ju`
    ON `r`.`jurusan_id` = `ju`.`id`
    WHERE `r`.`user_id` = $userId AND `r`.`tahun_id`= $tahunId
";
    return $this->db->query($query)->getRowArray();
  }

  public function getRegistrasiByTahunActive()
  {
    $query = "SELECT `r`.*,`t`.`tahun`,`t`.`start_date`,`t`.`end_date`,`t`.`anounc_date`,`i`.`nama`,`j`.`nama_jalur`
    FROM `registrasi` AS `r`
    JOIN `tahun_akademik` AS `t`
    ON `r`.`tahun_id` = `t`.`id`
    JOIN `users` AS `u`
    ON `r`.`user_id` = `u`.`id`
    JOIN `identitas_diri` AS `i`
    ON `i`.`user_id` = `u`.`id`
    JOIN `jalur_registrasi` AS `j`
    ON `r`.`jalur_id` = `j`.`id`
    WHERE `t`.`active`= 1
";
    return $this->db->query($query)->getResultArray();
  }
  public function getAmountRegistrasiByTahun()
  {
    $query = "SELECT COUNT(`r`.`id`) as `amount`
    FROM `registrasi` AS `r`
    JOIN `tahun_akademik` AS `t`
    ON `r`.`tahun_id` = `t`.`id`
    WHERE `t`.`active`= 1
";
    return $this->db->query($query)->getRowArray();
  }

  public function getRegistrasiById($id)
  {
    $query = "SELECT `r`.*,`t`.`tahun`,`t`.`start_date`,`t`.`end_date`,`t`.`anounc_date`,`i`.`nama`,`j`.`nama_jalur`,`ju`.`nama_jurusan`
    FROM `registrasi` AS `r`
    JOIN `tahun_akademik` AS `t`
    ON `r`.`tahun_id` = `t`.`id`
    JOIN `users` AS `u`
    ON `r`.`user_id` = `u`.`id`
    JOIN `identitas_diri` AS `i`
    ON `i`.`user_id` = `u`.`id`
    JOIN `jalur_registrasi` AS `j`
    ON `r`.`jalur_id` = `j`.`id`
    JOIN `jurusan` AS `ju`
    ON `r`.`jurusan_id` = `ju`.`id`
    WHERE `t`.`active`= 1 AND `r`.`id`=$id
";
    return $this->db->query($query)->getRowArray();
  }
}
