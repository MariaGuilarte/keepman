<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Counter extends Model
{
  use SoftDeletes;
  
  protected $dates = ['deleted_at'];
  
  protected $fillable = ['title', 'color', 'start_date', 'user_id', 'status'];
  
  public function user(){
    return $this->belongsTo('App\User');
  }
  
  public function resets(){
    return $this->hasMany('App\Reset');
  }
}
