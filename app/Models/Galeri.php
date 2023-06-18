<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_galeri';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'galeri';

    protected $fillable = ['id_galeri', 'nama_galeri', 'tgl_galeri', 'deskripsi_galeri', 'foto_galeri'];
}
