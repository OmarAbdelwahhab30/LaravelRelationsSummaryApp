<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name', 'title','hospital_id','medical_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at','pivot','laravel_through_key','medical_id','hospital_id'
    ];

    public $table = "doctors";

    ######################### Begin Relations ##########################

    public function hospital()
    {
        return $this->belongsTo(Hospital::class,'hospital_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'doctor_service','doctor_id','service_id');
    }

    ######################### End Relations ############################
}
