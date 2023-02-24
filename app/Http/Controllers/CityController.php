<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class CityController extends Controller{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function getCompanies($city_id)
    {
        $city = City::find($city_id);
        $companies = $city->companies;
        return response()->json($companies);
    }
}

