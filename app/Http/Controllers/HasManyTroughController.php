<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class HasManyTroughController extends Controller
{
   public function GetTheCountryDoctors()
   {
       $countryWithDoctors = Country::with(["doctors" => function ($q){
            $q->select("doctors.name",'gender','title');
       }])->find(2);
       return response()->json($countryWithDoctors, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
   }
}
