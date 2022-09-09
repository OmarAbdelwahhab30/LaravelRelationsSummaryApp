<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $fillable = [
        'pdf','doctor_id'
    ];


    public $table = "medicals";

    ######################### Begin Relations ##########################

}
