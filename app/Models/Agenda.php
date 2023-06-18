<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_agenda';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'agenda';

    protected $fillable = ['id_agenda', 'nama_agenda', 'status_agenda', 'tgl_agenda', 'deskripsi_agenda', 'foto_agenda'];
}
