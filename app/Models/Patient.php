<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'medical_id',
    ];


    public $table = "patients";

    ######################### Begin Relations ##########################

    public function doctor(){
        return $this->hasOneThrough(Doctor::class,Medical::class);
    }

}
