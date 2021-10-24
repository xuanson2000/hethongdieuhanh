<?php

namespace App\Http\Controllers;
use App\roles_user;
use App\Admin;
use App\Role;
use Hash;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){

		$user=Admin::all();
	return view('User.index',['user'=>$user]);
	}

	public function create(){
		$role =Role::all();
		return view('User.add',['role'=>$role]);
	}

	 public function store(Request $require){
   
   	try
   	{   DB::beginTransaction();
   		$use_create= new Admin;
   		$use_create->name= $require->name;
   		$use_create->username= $require->username;
      $use_create->password= $require->password;
   		$use_create->password= Hash::make($require->password);

   		$use_create->save();

   		$role = $require->roles;

   		foreach ($role as $ro) {
   			\DB::table('roles_user')->insert([
   				'user_id'=> $use_create->id,
   				'role_id' => $ro
   			]); 
   		} 
   		DB::commit(); 
   		return redirect()->route('user_index');

   	}
   	catch(\Exception $ex){
   		DB::rollback();

   	}


  }

     public function delete($id){

   // try
   // {
      // DB::beginTransaction();
      $user_delete = Admin::find($id);
  
      $user_delete->delete();


      $user =roles_user::where('user_id',$id)->get();
      foreach ($user as $delete) {
        
        $delete->delete();
      }
    
    // DB::commit(); 
    return redirect()->route('user_index');

    //  }
    // catch(\Exception $ex){
    //  DB::rollback();

    // }


  }

}
