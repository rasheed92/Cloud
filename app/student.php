<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
  public function files()
  {
      return $this->hasMany('App\file');
  }
}
