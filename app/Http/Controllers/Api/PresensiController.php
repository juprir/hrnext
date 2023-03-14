<?php

namespace App\Http\Controllers\Api;

use App\Actions\BeriKategoriKehadiran;
use App\Actions\HitungPotonganTunkin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PresensiStoreRequest;
use App\Models\LogPresensi;
use App\Models\Pegawai;
use App\Models\Presensi;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function store(
        PresensiStoreRequest $request,
        BeriKategoriKehadiran $beriKategoriKehadiran,
        HitungPotonganTunkin $hitungPotonganTunkin
    ) {
        $validated = $request->validated();

        LogPresensi::create($validated);

        $presensi = Presensi::query()
            ->where('pegawai_id', Pegawai::where('id_sidik_jari', $validated['id_sidik_jari'])->first()->id)
            ->where('tanggal', '=', Carbon::parse($validated['waktu_mesin'])->format('Y-m-d'))
            ->first();

        if ($presensi) {
            $presensi->update([
                'waktu_pulang' => $validated['waktu_mesin'],
            ]);

            $presensi->refresh();
        } else {
            $presensi = Presensi::create([
                'pegawai_id' => Pegawai::where('id_sidik_jari', $validated['id_sidik_jari'])->first()->id,
                'tanggal' => $validated['waktu_mesin'],
                'waktu_datang' => $validated['waktu_mesin'],
            ]);
        }

        $presensi = $beriKategoriKehadiran->handle($presensi);
        $presensi = $hitungPotonganTunkin->handle($presensi);

        return $presensi;
    }
}
