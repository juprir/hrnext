<?php

namespace App\Enums;

enum StatusCuti: string
{
    case DRAFT = 'draft';
    case APPROVAL = 'pengajuan';
    case VERIFICATION = 'verification';
    case VERIFIED = 'verified';
    case SUSPENDED = 'ditangguhkan';
    case REJECTEDBYSUPERIOR = 'ditolak atasan';
    case REJECTEDBYADMIN = 'ditolak admin';

    public function warna(): string
    {
        return match ($this) {
            self::DRAFT => 'grey',
            self::APPROVAL => 'yellow',
            self::VERIFICATION => 'orange',
            self::VERIFIED => 'blue',
            self::SUSPENDED => 'rose',
            self::REJECTEDBYSUPERIOR => 'red',
            self::REJECTEDBYADMIN => 'black',
        };
    }

    public function penjelasan(): string
    {
        return match ($this) {
            self::DRAFT => 'Berupa draf dan posisi berada masih di pegawai',
            self::APPROVAL => 'Sedang diajukan persetujuan ke atasan',
            self::VERIFICATION => 'Posisi di admin, belum diverifikasi',
            self::VERIFIED => 'Sudah diverifiksi dan dianggap sah',
            self::SUSPENDED => 'Ditangguhkan oleh atasan',
            self::REJECTEDBYSUPERIOR => 'Ditolak oleh atasan',
            self::REJECTEDBYADMIN => 'Ditolak oleh admin',
        };
    }
}
