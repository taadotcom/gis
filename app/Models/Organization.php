<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'bureau_code',
        'bureau_abv_name',
        'bureau_name',
        'division_code',
        'division_abv_name',
        'division_name',
        'station_code',
        'station_abv_name',
        'station_name',

    ];

}
