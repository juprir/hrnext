<?php

namespace App\Http\Controllers;

use App\Actions\GenerateListTanggalPerBulanDiTanggal;
use App\Actions\PresensiPerbulan;
use App\Http\Requests\PresensiFilterRequest;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index(
        PresensiFilterRequest $request,
        GenerateListTanggalPerBulanDiTanggal $generateTanggal
        // PresensiPerbulan $presensiPerBulan
    ) {
        if (! Auth::user()->pegawai) {
            return redirect()->route('dashboard');
        }

        $tanggal = Carbon::parse($request->all()['tanggal']);

        $listTanggal = $generateTanggal->handle($tanggal);

        $presensi = Presensi::query()
            ->where('pegawai_id', Auth::user()->pegawai->id)
            ->whereMonth('tanggal', '=', $tanggal->month)
            ->orderBy('tanggal')
            ->get();

        $list = $listTanggal->map(function ($item) use ($presensi) {
            $match = $presensi->firstWhere('tanggal', $item['tanggal']);

            $item['waktu_datang'] = $match ? $match['waktu_datang_string'] : '';
            $item['waktu_pulang'] = $match ? $match['waktu_pulang_string'] : '';
            $item['kategori'] = $match ? $match['nama_kategori'] : '';
            $item['potongan_tunjangan_kinerja'] = $match ? (int) $match['potongan_tunjangan_kinerja'] : 0;

            return $item;
        });

        return inertia('Presensi', [
            'list' => $list,
            'periode' => $tanggal->locale('id_ID')->isoFormat('MMMM YYYY'),
            'statistik' => [
                ['nama' => 'Potongan Tunjangan Kinerja', 'stat' => $list->sum('potongan_tunjangan_kinerja') / 100 .'%'],
                // ['nama' => 'Saldo Cuti', 'stat' => $pegawai->saldoCuti->where('aktif', 1)->sum('jumlah')],
                ['nama' => 'Info Lain', 'stat' => 100],
            ],
        ]);
    }
}
