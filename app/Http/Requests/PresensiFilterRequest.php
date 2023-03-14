<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PresensiFilterRequest extends FormRequest
{
    public function __construct()
    {
        $this->redirect = route('presensi.index', [], false);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tahunMaks = (int) date('Y');
        $tahunMin = (int) $tahunMaks - 2;

        return [
            'tahun' => "nullable|integer|between:{$tahunMin},{$tahunMaks}",
            'bulan' => 'nullable|integer|between:1,12',
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);

        $data['tanggal'] = (array_key_exists('tahun', $data) && array_key_exists('bulan', $data)) ?
            Carbon::create($data['tahun'], $data['bulan'])->format('Y-m-d')
            : today()->format('Y-m-d');

        return $data;
    }

    public function messages()
    {
        return [
            'tahun.integer' => 'Pilihan tahun harus dalam bentuk integer',
            'tahun.between' => 'Pilihan tahun harus antara {$tahunMin} - {$tahunMaks}',
            'bulan.integer' => 'Pilihan bulan harus dalam bentuk integer',
            'bulan.between' => 'Pilihan bulan harus antara :min - :max',
        ];
    }
}
