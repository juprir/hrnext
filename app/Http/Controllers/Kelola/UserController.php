<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Resources\Kelola\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return inertia('Kelola/User/Index', [
            'data' => UserResource::collection(
                User::query()
                    ->with([
                        'pegawai:id,nama,user_id,jabatan_id',
                        'pegawai.jabatan:id,nama',
                    ])
                    ->select('id', 'name')
                    ->paginate(10)
                    ->onEachSide(0)
            ),
        ]);
    }
}
