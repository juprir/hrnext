<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musim extends Model
{
    use HasFactory;

    protected $table = 'musim';

    protected $guarded = [];

    public function ketentuanKehadiran()
    {
        return $this->hasMany(KetentuanKehadiran::class, 'musim_id');
    }

    public function scopeDefault(Builder $query)
    {
        $query->where('default', 1);
    }
}
