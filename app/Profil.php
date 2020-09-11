<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = ['nama', 'ttl', 'alamat'];
    public $timestamp = true;

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
