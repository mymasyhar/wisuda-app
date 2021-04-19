<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $periode = Periode::latest()->with('pelaksanaan')->first();
        // dd($periode);
        return view('home', compact('periode'));
    }

    public function getPeriodeByTA($id, $nama)
    {
        $periode = Periode::whereTahunAjaranId($id)->whereNama($nama)->first();
        $result['start'] = $periode->start;
        $result['end'] = $periode->end;

        return response($result);
    }
}
