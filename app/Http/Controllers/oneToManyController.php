<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class oneToManyController extends Controller
{
    public function GetDoctorsByHospital()
    {
        //$hospital = Hospital::find(1);
        // return $hospital->doctors ;
        $HospitalWithDoctors = Hospital::with("doctors")->find(1);
        return response()->json($HospitalWithDoctors, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }

    public function GetHospitalByDoctor()
    {
        //Get The Doctor
        //$Doctor =  Doctor::find(1);
        //return response()->json($Doctor, 200, array(), JSON_PRETTY_PRINT);

        // for which Hospital The Doctor Works?
        //return response()->json($Doctor->hospital, 200, array(), JSON_PRETTY_PRINT);

        $DoctorAndHospital = Doctor::with("hospital")->find(1);
        return response()->json($DoctorAndHospital->makeHidden("hospital_id"), 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);

    }

    public function GetHospitalsWithMaleDoctors()
    {
         $MaleDoctors =  Hospital::whereHas("doctors" , function($q){
                $q->where("gender","male");
        })->get();
        return response()->json($MaleDoctors, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }


    public function GetHospitalsWithNoMaleDoctors(){
        $MaleDoctors =  Hospital::with("doctors")->whereDoesntHave("doctors" , function($q){
            $q->where("gender","male");
        })->get();
        return response()->json($MaleDoctors, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }

    public function DeleteHospitalsWithItsChildren($id)
    {
        $hospital = Hospital::findOrFail($id);

        if ( $hospital->doctors()->delete() && $hospital->delete()){
            return redirect()->back()->with('success','Hospitals Has been deleted Successfully');
        }

        return redirect()->back()->with('fail','Some thing went wrong try again later');

    }
}
