<?php
namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable

{
	public $timestamps = false;

    use Notifiable;
 
      public function roles(){

        return $this->belongsToMany(Role::class);
    }
    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

       'name','username','password','password_change_at','created_at','updated_at',

    ];


    /**


     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password', 'remember_token',

    ];

}