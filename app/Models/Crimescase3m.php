<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crimescase3m extends Model
{
    use HasFactory;
    protected $table = 'crimescase3m_all';
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
        'c4t1',
        'c4t2',
        'c4t3',
        'c4t4',
        'c5t1',
        'c5t2',
        'c5t3',
        'c5t4',
        'c5t5',
    ];
}
