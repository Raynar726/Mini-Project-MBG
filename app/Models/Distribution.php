<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $fillable = ['sekolah_id', 'tanggal_distribusi'];

    public function sekolah() {
        return $this->belongsTo(School::class, 'sekolah_id');
    }
}