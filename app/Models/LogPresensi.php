<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPresensi extends Model
{
    use HasFactory;

    protected $table = 'log_presensi';

    protected $guarded = [];
}
