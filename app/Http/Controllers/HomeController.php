<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $pending = count(DB::table('activities')
        ->where('activity_status', '=', 'pending')
        ->get());

        $complete = count(DB::table('activities')
        ->where('activity_status', '=', 'complete')
        ->get());

        return view('pages/dashboard',compact('complete','pending'));
    }
}
