<?php

namespace App\Http\Resources\Kelola;

use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama_dan_gelar,
            'nip' => $this->nip,
            'pangkat' => $this->pangkat->nama,
            'jabatan' => $this->jabatan->nama,
            'id_sidik_jari' => $this->id_sidik_jari,
        ];
    }
}
