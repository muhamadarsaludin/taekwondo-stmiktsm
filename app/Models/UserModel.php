<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
  protected $allowedFields = ['email', 'username', 'password', 'role', 'aktif', 'foto', 'nama', 'tingkat', 'rentang_umur', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'kontak', 'nama_ortu', 'kontak_ortu'];

  protected $useTimestamps = true;

  protected $db;
  protected $builder;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table($this->table);
  }

  public function getByEmailOrUsername($emailOrUsername)
  {
    $sql = "SELECT * FROM users WHERE email=? OR username=?";
    $query = $this->db->query($sql, [$emailOrUsername, $emailOrUsername]);
    return $query->getRowArray();
  }

  public function getAllUsers()
  {
    return $this->builder->get()->getResultArray();
  }

  public function getUserById($id)
  {
    return $this->builder->getWhere(['id' => $id])->getRowArray();
  }

  public function getUserByIdObj($id)
  {
    return $this->builder->getWhere(['id' => $id])->getRow();
  }

  public function getUsersByRole($role)
  {
    return $this->builder->getWhere('role', $role)->getResultArray();
  }
}
