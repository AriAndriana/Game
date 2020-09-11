<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['versi', 'developer', 'publisher'];
    public $timestamp = true;

    public function artikel() {
        return $this->belongsTo('App\Artikel', 'artikel_id');
    }
}
