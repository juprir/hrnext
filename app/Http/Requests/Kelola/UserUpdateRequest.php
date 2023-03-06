<?php

namespace App\Http\Requests\Kelola;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'roles' => ['sometimes', 'array'],
        ];
    }
}
