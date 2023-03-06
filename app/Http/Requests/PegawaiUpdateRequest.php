<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PegawaiUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_sidik_jari' => ['required', 'max:4', Rule::unique('pegawai', 'id_sidik_jari')->ignore($this->pegawai->id)],
        ];
    }
}
