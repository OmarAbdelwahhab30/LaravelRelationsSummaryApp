<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;

class HasOneController extends Controller
{
    public function hasOne(){
        //$user = User::with("phone")->find(1);

        $user = User::with(['phone' => function ($q)
        {
            $q->select('code','phone','user_id');
        }
        ])->find(1);
        $phone = $user->phone;
        $code  = $user->phone->code;
        return response()->json($user, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }

    public function ReverseHasOne(){
        $phone = Phone::with(["user" =>function($q)
        {
            $q->select("name",'email','id');
        }
        ])->find(1);
        $phone->makeVisible(["user_id"]);
        $phone->user->makeHidden(['email']);
        return response()->json($phone, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }

    public function GetUserWhereHas(){
        $user =  User::whereHas('phone',function ($q){
            $q->where("code","04");
        })->get();
        return response()->json($user, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);

    }

    public function GetUsetWhereDoesnotHave(){
        $user = User::whereDoesntHave('phone')->get();
        return response()->json($user, 200, array(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    }
}
