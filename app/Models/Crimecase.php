<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crimecase extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_charge',
        'incident_date',
        'incident_point',
        'incident_place',
        'lat',
        'lon',
        '4case_type'
    ];
}
