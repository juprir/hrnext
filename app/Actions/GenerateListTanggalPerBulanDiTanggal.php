<?php

namespace App\Actions;

use Carbon\CarbonInterface;
use Carbon\CarbonPeriod;

class GenerateListTanggalPerBulanDiTanggal
{
    public function handle(CarbonInterface $tanggal)
    {
        return collect(CarbonPeriod::create($tanggal->startOfMonth(), $tanggal->copy()->endOfMonth()))
            ->map(function ($item) {
                return [
                    'tanggal' => $item->format('Y-m-d'),
                ];
            });
    }
}
