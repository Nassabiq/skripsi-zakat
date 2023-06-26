<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ZIS extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_zis';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'zis';

    protected $fillable = [
        'id_zis',
        'user_id',
        'nama_muzakki',
        'no_pembayaran',
        'status_pembayaran',
        'jenis_bank',
        'tipe_zis',
        'nominal_pembayaran',
        'bukti_pembayaran',
        'validasi_data'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
