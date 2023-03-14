<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PresensiStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_sidik_jari' => 'required',
            'log_original_id' => 'required',
            'waktu_mesin' => 'required',
            'waktu_server' => 'required',
            'terminal_id' => 'required',
            'nama_terminal' => 'required',
            'metode' => 'required',
            'status' => 'required',
            'image' => 'nullable',
        ];
    }
}
