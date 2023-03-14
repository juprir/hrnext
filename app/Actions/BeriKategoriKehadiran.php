<?php

namespace App\Actions;

use App\Models\KategoriKehadiran;
use App\Models\Musim;
use App\Models\PeriodeMusim;
use App\Models\Presensi;
use Carbon\Carbon;

class BeriKategoriKehadiran
{
    public function handle(Presensi $presensi)
    {
        $periodeMusim = PeriodeMusim::aktif()->with('musim.ketentuanKehadiran')->first();

        if ($periodeMusim && Carbon::createFromDate($presensi->tanggal)->between($periodeMusim->tanggal_awal, $periodeMusim->tanggal_akhir)) {
            $ketentuanKehadiran = $periodeMusim->musim->ketentuanKehadiran;
        } else {
            $ketentuanKehadiran = Musim::default()->first()->ketentuanKehadiran;
        }

        $ketentuanWaktuDatang = Carbon::createFromTimeString(
            $presensi->tanggal.' '.$ketentuanKehadiran->firstWhere('hari', $presensi->namaHari)->waktu_datang
        );
        $ketentuanWaktuPulang = Carbon::createFromTimeString(
            $presensi->tanggal.' '.$ketentuanKehadiran->firstWhere('hari', $presensi->namaHari)->waktu_pulang
        );

        $kategori = match (true) {
            (empty($presensi->waktu_datang) && empty($presensi->waktu_pulang)) => 'Tidak hadir',
            (! empty($presensi->waktu_datang) && empty($presensi->waktu_pulang)) => 'Presensi satu kali',
            ($presensi->waktu_datang->gte($ketentuanWaktuDatang) && $presensi->waktu_pulang->gte($ketentuanWaktuPulang)) => 'Terlambat',
            ($presensi->waktu_datang->lte($ketentuanWaktuDatang) && $presensi->waktu_pulang->lte($ketentuanWaktuPulang)) => 'Mendahului',
            ($presensi->waktu_datang->gte($ketentuanWaktuDatang) && $presensi->waktu_pulang->lte($ketentuanWaktuPulang)) => 'Terlambat dan Mendahului',
            default => 'Hadir',
        };

        if (! $presensi->kategori || ! $presensi->kategori->melalui_pengajuan) {
            $presensi->update([
                'kategori_id' => KategoriKehadiran::where('nama', $kategori)->first()->id,
            ]);
        }

        $presensi->load('kategori');

        return $presensi;
    }
}
