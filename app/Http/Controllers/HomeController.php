<?php

namespace App\Http\Controllers;

use App\Models\Crimecase;
use App\Models\Organization;
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
        $count_2_1 = 0;
        $count_2_2 = 0;
        $count_2_3 = 0;
        $count_2_4 = 0;
        foreach ($cases as $item) {
            if (str_contains($item->case_type, '2.1')) {
                $count_2_1++;
            } elseif (str_contains($item->case_type, '2.2')) {
                $count_2_2++;
            } elseif (str_contains($item->case_type, '2.3')) {
                $count_2_3++;
            } elseif (str_contains($item->case_type, '2.4')) {
                $count_2_4++;
            }
        }
        error_log($count_2_1 . '/ ' .  $count_2_2 . ' /' .  $count_2_3 . '/ ' .  $count_2_4);
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
        return view('home')->with([
            'geojson' => $geojson,
            'count_2_1' => $count_2_1,
            'count_2_2' => $count_2_2,
            'count_2_3' => $count_2_3,
            'count_2_4' => $count_2_4,
            'div' => Organization::where('division_code' ,'=','20136')->get()
        ]);;
    }
}
