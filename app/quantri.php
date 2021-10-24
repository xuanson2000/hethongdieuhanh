<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class quantri extends  Authenticatable
{
    //
    protected $table ="quantri";
    public $timestamps = false;


    public function bantin(){
        return $this->hasManey('App\bantin','nguoiDang','id');
    }


    use Notifiable;

     protected $fillable = [

       'username','password','truycap','created_at','updated_at',

    ];
    protected $hidden = [

        'password', 'remember_token',

    ];


}
