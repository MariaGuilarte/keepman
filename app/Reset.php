<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reset extends Model
{
  use SoftDeletes;
  
  protected $dates = ['deleted_at'];
  
  protected $fillable = ['counter_id', 'count', 'start_date', 'finish_date'];
  
  public function counter(){
    return $this->belongsTo('App\Counter');
  }
}
