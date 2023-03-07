<?php

namespace App\Http\Resources\Kelola;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->name,
            'jumlah_permissions' => $this->permissions_count ?? '-',
            'jumlah_pengguna' => $this->users_count ?? '-',
        ];
    }
}
