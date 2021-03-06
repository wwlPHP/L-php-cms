<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
  protected $table = 'docs';
  protected $primarykey = 'id';
  public $timestamps = true;

  public $guarded=[];

  public function adminUser()
  {
    return $this->belongsTo('App\Http\Model\AdminUser', 'publisher_id', 'id');
  }

  public function categorys()
  {
    //return $this->belongsTo('App\Http\Model\Category', 'category', 'slug')->select('name');
    return $this->belongsTo('App\Http\Model\Category', 'category', 'slug');
  }


}
