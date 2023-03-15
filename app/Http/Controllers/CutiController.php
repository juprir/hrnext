<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::where('pegawai_id', Auth::user()->pegawai->id)
            ->with(['jenisCuti', 'alasanCuti'])
            ->get();

        return inertia('Cuti/Index', [
            'list' => $cuti,
            'statistik' => [
                ['nama' => 'Saldo Cuti Tahunan', 'stat' => 12],
                ['nama' => 'Saldo Cuti Pengganti', 'stat' => 2],
                ['nama' => 'Total Saldo Cuti', 'stat' => 24],
            ],
        ]);
    }

    public function create()
    {
        return inertia('Cuti/Create');
    }
}
