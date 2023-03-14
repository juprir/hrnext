<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeMusim extends Model
{
    use HasFactory;

    protected $table = 'periode_musim';

    protected $guarded = [];

    protected $casts = [
        'tanggal_awal' => 'date',
        'tanggal_akhir' => 'date',
    ];

    public function musim()
    {
        return $this->belongsTo(Musim::class, 'musim_id');
    }

    public function scopeAktif(Builder $query)
    {
        $query->where('aktif', 1);
    }
}
