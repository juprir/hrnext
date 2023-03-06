<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kelola\UserUpdateRequest;
use App\Http\Resources\Kelola\UserResource;
use App\Models\Role;
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

    public function create()
    {
        return 'TODO';
    }

    public function edit(User $user)
    {
        $user = new UserResource(
            $user->load([
                'pegawai:id,nama,user_id,jabatan_id',
                'pegawai.jabatan:id,nama',
                'roles:id,name',
            ])
        );

        return inertia('Kelola/User/Edit', [
            'data' => $user,
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $validated = $request->safe()->only(['roles']);

        $user->syncRoles([
            'roles' => $validated['roles'],
        ]);

        return redirect()->route('kelola.user.index');
    }
}
