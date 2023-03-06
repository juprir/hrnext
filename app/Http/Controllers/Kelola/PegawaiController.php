<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kelola\PegawaiUpdateRequest;
use App\Http\Resources\Kelola\PegawaiResource;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        return inertia('Kelola/Pegawai/Index', [
            'data' => PegawaiResource::collection(
                Pegawai::query()
                    ->select(
                        'id',
                        'nama',
                        'gelar_depan',
                        'gelar_belakang',
                        'nip',
                        'pangkat_id',
                        'jabatan_id',
                        'id_sidik_jari'
                    )
                    ->with(['pangkat:id,nama', 'jabatan:id,nama'])
                    ->paginate(10)
                    ->onEachSide(0)
            ),
        ]);
    }

    public function create()
    {
        return 'TODO';
    }

    public function edit(Pegawai $pegawai)
    {
        $pegawai = new PegawaiResource(
            $pegawai->load(['pangkat:id,nama', 'jabatan:id,nama'])
        );

        return inertia('Kelola/Pegawai/Edit', [
            'data' => $pegawai,
        ]);
    }

    public function update(Pegawai $pegawai, PegawaiUpdateRequest $request)
    {
        $validated = $request->safe()->only(['id_sidik_jari']);

        $pegawai->update([
            'id_sidik_jari' => $validated['id_sidik_jari'],
        ]);

        return redirect()->route('kelola.pegawai.index');
    }
}
