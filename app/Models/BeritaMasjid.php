<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaMasjid extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_berita_masjid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'berita_masjid';

    protected $fillable = ['id_berita_masjid', 'nama_berita', 'tgl_berita', 'deskripsi_berita', 'foto_berita', 'is_published'];
}
