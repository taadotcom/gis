<?php

namespace App\Http\Controllers;

use App\Models\Crimecase;
use App\Models\Organization;
use App\Models\Station;
use Dotenv\Parser\Value;
use Error;
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
        $cases = DB::table('crimescase3m')->get();
        $geojson = array(
            'type' => 'FeatureCollection',
            'features'  => array()
        );
        for ($i = 0; $i < count($cases); $i++) {
            $coordinates = explode(" ", substr($cases[$i]->geom, 7, -1));
            $feature = array(
                // 
                'type' => 'Feature',
                "properties" => array(
                    'id' => $cases[$i]->id,
                    "charge" => $cases[$i]->charge,
                    // 'incident_date' => $cases[$i]->incident_date,
                    // 'incident_place' => $cases[$i]->incident_place,
                    // 'incident_point' => $cases[$i]->incident_point,
                    // '4case_type' => $cases[$i]->case_type,
                ),
                'geometry' => array(
                    'type' => 'Point',
                    # Pass Longitude and Latitude Columns here
                    'coordinates' => [(float)$coordinates[0], (float)$coordinates[1]]
                )
            );
            // dd($feature);
            array_push($geojson['features'], $feature);
        }
        $policeArea =  $this->getPoliceArea();

        $org = Organization::where('bureau_code', '=', '10008')->select('division_code', 'division_abv_name')->get(); // บช.น.
        $station = Station::all();
        // dd($org);
        return view('home')->with([
            'geojson' => $geojson,
            'org' => $org,
            'station' => $station,
            'policeArea' => json_decode($policeArea)->features,
        ]);
    }

    public function getPoliceArea()
    {
        $policeArea = Storage::get('phuket.geojson');
        return $policeArea;
    }
}
