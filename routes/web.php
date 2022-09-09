<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "IndexController@index")->name("index");
Route::get("/hospitals","IndexController@Allhospitals")->name("hospitals.all");


###################### Begin one to one relation #######################
Route::get('/HasOne', "HasOneController@hasOne")->name("hasOne");
Route::get("ReverseHasOne","HasOneController@ReverseHasOne")->name("ReverseHasOne");
Route::get("whereHas",'HasOneController@GetUserWhereHas')->name("WhereHas");
Route::get("whereDoesNotHave",'HasOneController@GetUsetWhereDoesnotHave')->name("WhereDoesnotHave");
###################### End one to one relation #######################



###################### Begin one to many relation #######################
Route::get('/GetDoctorsByHospital', "oneToManyController@GetDoctorsByHospital")->name("GetDoctorsByHospital");
Route::get('/GetHospitalByDoctor', "oneToManyController@GetHospitalByDoctor")->name("GetHospitalByDoctor");
Route::get("/GetHospitalsWithMaleDoctors",'oneToManyController@GetHospitalsWithMaleDoctors')->name("GetHospitalsWithMaleDoctors");
Route::get("/GetHospitalsWithNoMaleDoctors",'oneToManyController@GetHospitalsWithNoMaleDoctors')->name("GetHospitalsWithNoMaleDoctors");
Route::get("/DeleteHospitalsWithItsChildren/{id}","oneToManyController@DeleteHospitalsWithItsChildren")->name("hospitals.delete");
###################### End one to many relation #######################




###################### Begin many to many relation #######################
Route::get('/doctorsServices','ManyToManyController@getDoctorServices')->name("getDoctorServices");
Route::get('/serviceDoctors','ManyToManyController@getServiceDoctors')->name("getServiceDoctors");
Route::get("/AllDoctors",'IndexController@AllDoctors')->name("AllDoctors");
Route::get("/AllDoctorsServices/{id}",'ManyToManyController@DisplayDoctorServices')->name("doctor.services");
Route::post("/AddService",'ManyToManyController@AddService')->name("doctor.attachService");

###################### End one to many relation #######################



###################### Begin has one Through  relation #######################
Route::get('/HasOneThrough','HasOneTroughController@GetThePatientDoctor')->name("Patient.Doctor");
Route::get('/HasManyThrough','HasManyTroughController@GetTheCountryDoctors')->name("Country.Doctors");
###################### End has one Through  relation #######################
