<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{

    protected $fillable = [
        'name', 'address',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public $table = "hospitals";

    ######################### Begin Relations ##########################

    public function doctors(){
        return $this->hasMany(Doctor::class,'hospital_id');
    }

    ######################### End Relations ############################
}
