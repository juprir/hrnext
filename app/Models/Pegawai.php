<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $guarded = [];

    protected $casts = [
        'tanggal_lahir' => 'date:d-m-Y',
    ];

    protected $appends = ['nama_dan_gelar'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'jabatan_id');
    }

    protected function namaDanGelar(): Attribute
    {
        return Attribute::make(
            get: function () {
                $nama_dan_gelar = $this->gelar_depan ? $this->gelar_depan.' ' : '';
                $nama_dan_gelar .= $this->nama;
                $nama_dan_gelar .= $this->gelar_belakang ? ', '.$this->gelar_belakang : '';

                return $nama_dan_gelar;
            }
        );
    }

    protected function jenisKelamin(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return match ($value) {
                    1 => 'Laki-laki',
                    2 => 'Perempuan',
                    default => '',
                };
            },
            set: function ($value) {
                return match ($value) {
                    'Laki-laki' => 1,
                    'Perempuan' => 2,
                };
            },
        );
    }
}
