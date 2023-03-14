<?php

namespace App\Models;

use App\Enums\StatusCuti;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';

    protected $guarded = [];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'status' => StatusCuti::class,
    ];

    public function jenisCuti()
    {
        return $this->belongsTo(JenisCuti::class, 'jenis_cuti_id');
    }

    public function alasanCuti()
    {
        return $this->belongsTo(AlasanCuti::class, 'alasan_cuti_id');
    }
}
