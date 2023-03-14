<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoCuti extends Model
{
    use HasFactory;

    protected $table = 'saldo_cuti';

    protected $guarded = [];

    public function scopeCutiPengganti($query)
    {
        $query->where('jenis', 'pengganti');
    }

    public function scopeCutiTahunan($query)
    {
        $query->where('jenis', 'tahunan');
    }

    public function scopeAdaSaldo($query)
    {
        $query->where('jumlah', '>', 0);
    }

    public function scopeAktif($query)
    {
        $query->where('aktif', true);
    }
}
