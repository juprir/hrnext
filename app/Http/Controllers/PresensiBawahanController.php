<?php

namespace App\Http\Controllers;

use App\Actions\ListIdBawahan;
use App\Models\Pegawai;
use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PresensiBawahanController extends Controller
{
    public function index(ListIdBawahan $listIdBawahan)
    {
        $pegawai = Auth::user()->pegawai;

        if (! $pegawai->unit_organisasi_id_sekarang) {
            return redirect()->route('dashboard');
        }

        $idBawahan = $listIdBawahan->handle($pegawai->unit_organisasi_id_sekarang, $pegawai->id);

        if (! count($idBawahan)) {
            return redirect()->route('dashboard');
        }

        $bawahan = Pegawai::find($idBawahan)->sortBy('nama');

        $list = $bawahan->map(function ($item) {
            $match = Presensi::query()
                ->where('pegawai_id', $item->id)
                ->whereDate('tanggal', today())
                ->first();

            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'jabatan' => $item->nama_jabatan_sekarang,
                'waktu_datang' => $match ? $match->waktu_datang_string : '',
                'waktu_pulang' => $match ? $match->waktu_pulang_string : '',
                'kategori' => $match ? $match->nama_kategori : '',
            ];
        });

        return inertia('Bawahan/Presensi', [
            'list' => $list,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
