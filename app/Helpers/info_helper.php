<?php

function user_info()
{
  return (object) session()->get('user_info');
}
