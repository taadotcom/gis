<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crimecase3m extends Model
{
    use HasFactory;
    protected $fillable = [
        'geom',
        'caseno',
        'caseyear',
        'orgcode',
        'division',
        'subdistrict',
        'charge',
        'occurdate',
        'stationname',
        'bk',
        'bh',
        'interrogator',
    ];
}
