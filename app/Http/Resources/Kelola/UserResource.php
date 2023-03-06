<?php

namespace App\Http\Resources\Kelola;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->pegawai?->nama ?? $this->name,
            'jabatan' => $this->pegawai?->jabatan?->nama ?? '-',
            'roles' => $this->roles ?? [],
        ];
    }
}
