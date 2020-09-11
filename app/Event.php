<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['judul', 'slug', 'berita'];
    public $timestamp = true;

    public function kategori() {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }
    public function tag() {
        return $this->hasMany('App\Tag', 'tag_id');
    }
    public function genre() {
        return $this->belongsTo('App\Genre', 'genre_id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
