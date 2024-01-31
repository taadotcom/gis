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
            'crs' => $crs,
            'features'  => array()
        );
        for ($i = 0; $i < count($cases); $i++) {
            $feature = array(
                // 
                'type' => 'Feature',
                "properties" => array(
                    'id' => $cases[$i]->id,
                    "mag" => 1,
                    "time" => 1704446963054,
                ),
                'geometry' => array(
                    'type' => 'Point',
                    # Pass Longitude and Latitude Columns here
                    'coordinates' => array((float) $cases[$i]->lat, (float)$cases[$i]->long)
                )
            );
            array_push($geojson['features'], $feature);
        }
        // dd(json_encode($geojson));
        // error_log(json_encode($geojson));
        return view('home')->with(['geojson' => $geojson]);;
    }
}

// {
//     "type": "Feature",
//     "geometry": {
//       "type": "Point",
//       "coordinates": [125.6, 10.1]
//     },
//     "properties": {
//       "name": "Dinagat Islands"
//     }
//   }

// {"type": "Feature",  
//     "properties": { "id": "1","case_id": "1","case_type":" ลักทรัพย์","sufferer": "คนไทย","success": "สำเร็จ","mag": 1, "time":1704413268712},
//     "geometry": {"type": "Point","coordinates": [100.582690,13.7674600]} },