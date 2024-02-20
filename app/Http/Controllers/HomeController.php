<?php

namespace App\Http\Controllers;

use App\Models\Crimecase;
use App\Models\Organization;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
                    "main_charge" => $cases[$i]->main_charge,
                    'incident_date' => $cases[$i]->incident_date,
                    'incident_place' => $cases[$i]->incident_place,
                    'incident_point' => $cases[$i]->incident_point,
                    '4case_type' => $cases[$i]->case_type,
                ),
                'geometry' => array(
                    'type' => 'Point',
                    # Pass Longitude and Latitude Columns here
                    'coordinates' => array((float) $cases[$i]->lon, (float)$cases[$i]->lat)
                )
            );
            array_push($geojson['features'], $feature);
        }
        $policeArea =  $this->getPoliceArea();

        return view('home')->with([
            'geojson' => $geojson,
            'org' => Organization::where('division_code', '=', '20136')->get(),
            'policeArea' => json_decode($policeArea)->features,
        ]);
    }

    public function getPoliceArea()
    {
        $policeArea = Storage::get('map_bkk.geojson');
        return $policeArea;
    }
}
