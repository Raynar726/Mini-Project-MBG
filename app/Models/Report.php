<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'pelapor_id', 'sekolah_id', 'distribusi_id', 
        'deskripsi_kejadian', 'status', 'file_bukti'
    ];

    public function pelapor() {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    public function sekolah() {
        return $this->belongsTo(School::class, 'sekolah_id');
    }

    public function distribusi() {
        return $this->belongsTo(Distribution::class, 'distribusi_id');
    }
}