<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nama', 'slug'];
    public $timestamp = true;

    public function artikel() {
        return $this->belongsToMany('App\Artikel', 'artikel_tags', 'tag_id', 'artikel_id');
    }
    // public function event() {
    //     return $this->belongsToMany('App\Event', 'kategori_id');
    // }
}
