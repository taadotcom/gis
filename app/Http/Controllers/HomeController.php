<?php

namespace App\Http\Controllers;

use App\Models\Crimecase;
use Illuminate\Support\Facades\DB;

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
        $cases = DB::table('crimecases')->take(3)->get();
        $data = [];
        error_log('count'.count($cases));
        for ($i = 0; $i < count($cases); $i++) {
           error_log($cases[$i]->id);
          }
        return view('home',['cases'=> $cases]);
    }
}
