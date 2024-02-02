<?php

namespace App\Http\Controllers;

use App\Models\Crimecase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cases = DB::table('crimecases')->get();
        $crs = new \GeoJson\CoordinateReferenceSystem\Named('urn:ogc:def:crs:OGC:1.3:CRS84');
        $geojson = array(
            'type' => 'FeatureCollection',
            'features'  => array()
        );
        for ($i = 0; $i < count($cases); $i++) {
            $feature = array(
                // 
                'type' => 'Feature',
                "properties" => array(
                    'id' => $cases[$i]->id,
                    "time" => 1704446963054,
                ),
                'geometry' => array(
                    'type' => 'Point',
                    # Pass Longitude and Latitude Columns here
                    'coordinates' => array((float) $cases[$i]->lon, (float)$cases[$i]->lat)
                )
            );
            array_push($geojson['features'], $feature);
        }
        // dd(json_encode($geojson));
        error_log(isset($geojson));
        error_log(json_encode($geojson));
        return view('home')->with(['geojson' => json_encode($geojson)]);;
    }
}
