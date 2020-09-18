<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('santris')->count();
        $query1 = DB::table('gurus')->count();
        $query2 = DB::table('kelas')->count();
        $profile = DB::table('santris')->where('nm_ayah',Auth::user()->name)->value('nm_santri');
        // $profile = DB::table('santris')->orderBy('name');
        return view('home',[
            'query' => $query, 
            'query1' => $query1, 
            'query2' => $query2, 
            'profile' => $profile
            ]);
    }

}
