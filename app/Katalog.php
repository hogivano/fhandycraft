<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    //
    protected $table = 'katalog';
    protected $fillable = ['slug', 'title', 'description', 'image', 'thumbnail_m', 'id_kategori', 'view',
    'low_price', 'end_price', 'color', 'created_at', 'updated_at'];

    public function Kategori(){
      return $this->belongsTo('App\Kategori', 'id_kategori');
    }
}
