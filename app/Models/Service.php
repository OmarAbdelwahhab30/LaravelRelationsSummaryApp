<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{


    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at','pivot',
    ];

    public $table = "services";

    public $timestamps = true;

    ######################### Begin Relations ##########################

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class,'doctor_service','service_id','doctor_id');
    }

    ######################### End Relations ############################
}
