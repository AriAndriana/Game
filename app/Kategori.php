<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['judul'];
    public $timestamp = true;

    public function artikel() {
        return $this->hasMany('App\Artikel', 'kategori_id');
    }
    public function event() {
        return $this->hasMany('App\Event', 'kategori_id');
    }
}
