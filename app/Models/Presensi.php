<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';

    protected $guarded = [];

    protected $casts = [
        'tanggal' => 'date',
        'waktu_datang' => 'datetime',
        'waktu_pulang' => 'datetime',
    ];

    protected $appends = ['nama_kategori', 'waktu_datang_string', 'waktu_pulang_string'];

    public function kategori()
    {
        return $this->belongsTo(KategoriKehadiran::class, 'kategori_id');
    }

    public function tanggal(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    public function waktuDatangString(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->waktu_datang?->format('H:i:s') ?? '',
        );
    }

    public function waktuPulangString(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->waktu_pulang?->format('H:i:s') ?? '',
        );
    }

    public function namaKategori(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->kategori ? $this->kategori->nama : '',
        );
    }

    public function namaHari(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::createFromDate($this->tanggal)->locale('id_ID')->dayName,
        );
    }
}
