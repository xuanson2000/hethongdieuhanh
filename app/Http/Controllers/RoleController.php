<?php

namespace App\Http\Controllers;
use DB;
use App\Role;
use App\User;
use App\Primesion;
use App\roles_primesion;

use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index(){

		$role=Role::all();
	return view('Role.index',['role'=>$role]);
	}

	public function create(){
		$pre =Primesion::all();

		return view('Role.add',['pre'=>$pre]);
	}
	
		
    
   public function store(Request $require){
   
   //  $use_create= $this->user->create([
   // 	'name'=> $require->name,
   // 	'email'=> $require->email,
   // 	'password'=> hash::make($require->password)
   // ]);

   //  $role = $require->role;
   //  dd($role);
   	try
   {   DB::beginTransaction();
   		$role_create= new Role;
   		$role_create->name= $require->name;
   		$role_create->display_name= $require->display_name;

   		$role_create->save();


       ///$use_create->roles()->attach($require->roles);


   		$pe = $require->prime;

   		foreach ($pe as $p) {
   			\DB::table('roles_primesion')->insert([
   				'role_id'=> $role_create->id,
   				'prime_id' => $p
   			]); 
   		} 
   		DB::commit(); 
   		return redirect()->route('role_index');

   	}
   	catch(\Exception $ex){
   		DB::rollback();

   	}


  }


   public function delete($id){

   // try
   // {
      // DB::beginTransaction();
   	  $role_delete = Role::find($id);
   

   	  $role_delete->delete();

      $roles =roles_primesion::where('role_id',$id)->get();
      foreach ($roles as $delete) {
      	$delete->delete();
      }
    
    // DB::commit(); 
   	return redirect()->route('role_index');

    // 	}
   	// catch(\Exception $ex){
   	// 	DB::rollback();

   	// }


  }

    //
}
