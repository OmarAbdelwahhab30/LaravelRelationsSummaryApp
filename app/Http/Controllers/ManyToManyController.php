<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function getDoctorServices()
    {
        $Output = Doctor::with(["services" => function($q){
                $q->select('name');
            }]
        )->find(1);
        return response()->json($Output, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }

    public function getServiceDoctors()
    {
        $Output = Service::with(["doctors" => function($q){
                $q->select('doctors.id','name');
            }]
        )->find(1);
        return response()->json($Output, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }

    public function DisplayDoctorServices($id){
        $allservices = Service::all();
        $alldocs = Doctor::all();
        $doc_services = Doctor::with(["services" => function($q){
                $q->select('services.name','services.id');
            }]
        )->find($id);
        return view("services",compact('doc_services','allservices','alldocs'));
    }

    public function AddService(Request $request)
    {
        $doc = Doctor::find($request->doctor_id);
        //$doc->services()->attach($request->services);   // repeat
        //$doc->services()->sync($request->services);     // update and detach old without repeat
        $doc->services()->syncWithoutdetaching($request->services);  // update and keep old without repeat

        return redirect()->back()->with('success', 'Data Saved Successfully');

    }
}
