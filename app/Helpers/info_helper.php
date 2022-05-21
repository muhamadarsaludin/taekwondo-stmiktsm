<?php

function user_info()
{
  return (object) session()->get('user_info');
}

function registered()
{
  if (user_info()->logged_in) {
    $registrasiModel = Model('RegistrasiModel');
    $myRegistrasi = $registrasiModel->getWhere(['user_id' => user_info()->user_id])->getRowArray();
    if ($myRegistrasi) {
      return true;
    }
    return false;
  }
}
