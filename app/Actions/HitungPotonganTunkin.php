<?php

namespace App\Actions;

use App\Models\Musim;
use App\Models\PeriodeMusim;
use App\Models\Presensi;
use Carbon\Carbon;

class HitungPotonganTunkin
{
    public function handle(Presensi $presensi)
    {
        if ($presensi->kategori->tunjangan_kinerja_dipotong) {
            return match ($presensi->kategori->satuan_waktu_potongan) {
                'hari' => $this->potongPerHari($presensi),
                'menit' => $this->potongPerHitunganMenit($presensi),
            };
        } else {
            $presensi->update([
                'potongan_tunjangan_kinerja' => null,
            ]);
        }
    }

    protected function potongPerHari(Presensi $presensi)
    {
        $presensi->update([
            'potongan_tunjangan_kinerja' => $presensi->kategori->persentase_potongan,
        ]);
    }

    protected function potongPerHitunganMenit(Presensi $presensi)
    {
        $jumlahMenit = match ($presensi->kategori->nama) {
            'Terlambat' => $this->hitungSelisihWaktuDatang($presensi),
            'Mendahului' => $this->hitungSelisihWaktuPulang($presensi),
            'Terlambat dan Mendahului' => $this->hitungSelisihWaktuDatangDanPulang($presensi),
        };

        $pengali = (int) ceil($jumlahMenit / $presensi->kategori->batas_waktu_potongan);
        $potongan = $pengali * $presensi->kategori->persentase_potongan;

        $presensi->update([
            'potongan_tunjangan_kinerja' => $potongan,
        ]);
    }

    protected function hitungSelisihWaktuDatang(Presensi $presensi)
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

        $waktuDatang = $presensi->waktu_datang->addSeconds(1);

        $perbedaanWaktu = [
            'jam' => $ketentuanWaktuDatang->diff($waktuDatang)->format('%h'),
            'menit' => $ketentuanWaktuDatang->diff($waktuDatang)->format('%i'),
            'detik' => $ketentuanWaktuDatang->diff($waktuDatang)->format('%s'),
        ];

        $jumlahMenit = (int) $perbedaanWaktu['jam'] * 60;
        $jumlahMenit += (int) $perbedaanWaktu['menit'];
        $jumlahMenit += ((int) $perbedaanWaktu['detik'] > 0) ?? $jumlahMenit;

        return $jumlahMenit;
    }

    protected function hitungSelisihWaktuPulang(Presensi $presensi)
    {
        $periodeMusim = PeriodeMusim::aktif()->with('musim.ketentuanKehadiran')->first();

        if ($periodeMusim && Carbon::createFromDate($presensi->tanggal)->between($periodeMusim->tanggal_awal, $periodeMusim->tanggal_akhir)) {
            $ketentuanKehadiran = $periodeMusim->musim->ketentuanKehadiran;
        } else {
            $ketentuanKehadiran = Musim::default()->first()->ketentuanKehadiran;
        }

        $ketentuanWaktuPulang = Carbon::createFromTimeString(
            $presensi->tanggal.' '.$ketentuanKehadiran->firstWhere('hari', $presensi->namaHari)->waktu_pulang
        );

        $perbedaanWaktu = [
            'jam' => $ketentuanWaktuPulang->diff($presensi->waktu_pulang->subSeconds(1))->format('%h'),
            'menit' => $ketentuanWaktuPulang->diff($presensi->waktu_pulang->subSeconds(1))->format('%i'),
            'detik' => $ketentuanWaktuPulang->diff($presensi->waktu_pulang->subSeconds(1))->format('%s'),
        ];

        $jumlahMenit = (int) $perbedaanWaktu['jam'] * 60;
        $jumlahMenit += (int) $perbedaanWaktu['menit'];
        $jumlahMenit += ((int) $perbedaanWaktu['detik'] > 0) ?? $jumlahMenit;

        return $jumlahMenit;
    }

    protected function hitungSelisihWaktuDatangDanPulang(Presensi $presensi)
    {
        return $this->hitungSelisihWaktuDatang($presensi) + $this->hitungSelisihWaktuPulang($presensi);
    }
}
