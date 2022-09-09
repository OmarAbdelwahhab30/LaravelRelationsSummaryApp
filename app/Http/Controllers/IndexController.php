<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view("index");
    }
    public function AllHospitals(){
        $hospitals = Hospital::orderBy('id','asc')->get();
        return view("all",compact('hospitals'));
    }

    public function AllDoctors(){
        $doctors = Doctor::orderBy('id','asc')->get();
        return view("doctors",compact('doctors'));
    }

}
