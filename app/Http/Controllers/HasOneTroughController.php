<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class HasOneTroughController extends Controller
{
    public function GetThePatientDoctor(){
        $patient = Patient::find(1);
        return response()->json($patient->doctor, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }
}
