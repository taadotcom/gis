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
        return view('home',['cases'=> $cases]);
    }
}
