<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['nama', 'deskripsi', 'dosis', 'jadwal_minum', 'kategori', 'gambar'];
}
