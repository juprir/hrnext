<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kelola\RoleUpdateRequest;
use App\Http\Resources\Kelola\RoleResource;
use App\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return inertia('Kelola/Role/Index', [
            'data' => RoleResource::collection(
                Role::query()
                    ->select('id', 'name')
                    ->withCount(['permissions', 'users'])
                    ->paginate(10)
                    ->onEachSide(0)
            ),
        ]);
    }

    public function create()
    {
        return 'TODO';
    }

    public function store()
    {
        return 'TODO';
    }

    public function show($role)
    {
        return Role::find($role); // TODO
    }

    public function edit(Role $role)
    {
        $role = new RoleResource(
            $role->load([
                'permissions',
            ])
        );

        return inertia('Kelola/Role/Edit', [
            'data' => $role,
            'permissions' => Permission::pluck('name', 'id'),
        ]);
    }

    public function update(Role $role, RoleUpdateRequest $request)
    {
        $validated = $request->safe()->only(['permissions']);

        $role->syncPermissions([
            'permissions' => $validated['permissions'],
        ]);

        return redirect()->route('kelola.peran.index');
    }
}
