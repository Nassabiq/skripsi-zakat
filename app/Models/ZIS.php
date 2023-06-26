<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZIS extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_zis';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'zis';

    protected $fillable = ['id_zis', 'nama_muzakki', 'no_pembayaran', 'status_pembayaran', 'validasi_data', 'jenis_bank', 'tipe_zis', 'nominal_pembayaran'];
}
