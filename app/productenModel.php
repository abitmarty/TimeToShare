<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class productenModel extends Model
{
  public $timestamps = true;
  protected $table = "producten";
  //public $fillable = ['uitgeleend_aan', 'uitgeleend'];

  public function producten(){
    return $this->hasOne('App\productenModel', 'product_naam', 'uitgeleend');
  }

  protected $fillable = [
      'uitgeleend_aan', 'uitgeleend', 'geacepteerd',
  ];

  public $incrementing = false;

  protected static function boot()
  {
      parent::boot();

      static::creating(function ($model) {
          $model->{$model->getKeyName()} = Uuid::generate()->string;
      });
  }
}
