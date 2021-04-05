<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    //
    function index (){
        return view('superadmin.add-periodic', ['title' => 'Add Periode']);
    }

    function addPeriode(Request $request){
        return $request->input();
    }
}
