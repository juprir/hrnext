<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class ListIdBawahan
{
    public function handle(int $organisasiId, int $pegawaiId)
    {
        $lookup = DB::table('pegawai')
            ->select('pegawai.id')
            ->join('pegawai_jabatan', 'pegawai.id', '=', 'pegawai_jabatan.pegawai_id')
            ->join('jabatan', 'jabatan.id', '=', 'pegawai_jabatan.jabatan_id')
            ->where('pegawai_jabatan.unit_organisasi_id', $organisasiId)
            ->where('pegawai.id', '!=', $pegawaiId)
            ->where('pegawai_jabatan.tmt', function ($query) {
                $query->selectRaw('MAX(tmt)')
                    ->from('pegawai_jabatan')
                    ->whereRaw('pegawai_jabatan.pegawai_id = pegawai.id');
            })->get();

        return $lookup?->pluck('id') ?? [];
    }
}
