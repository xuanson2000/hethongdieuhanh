<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Primesion;
use Illuminate\Support\Facades\Auth;

class CheckPrimesionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission =null)

    {
       // dd($pemision); lấy ra user vào hệ thống  Auth::guard('admin')->id()

            $listUser = DB::table('admins')
            ->join('roles_user', 'admins.id', '=', 'roles_user.user_id')
            ->join('roles', 'roles_user.role_id','=', 'roles.id')
            ->where('user_id', Auth::guard('admin')->id())
            ->select('roles.*')
            ->get()->pluck('id')->toArray();
            /// lấy ra quyền 

             $listUser = DB::table('roles')
            ->join('roles_primesion','roles.id', '=','roles_primesion.role_id')
            ->join('primesions', 'roles_primesion.prime_id', '=', 'primesions.id')
            ->whereIn('roles.id', $listUser)
            ->select('primesions.*')
            ->get()->pluck('id')->unique();


     
        //lấy id màn hình đang dăng nhap vào màn hìn

        $CheckPrimesio = Primesion::where('name',$permission)->value('id');
        //kiểm tra 
        //if($listUser->contains($CheckPrimesio))
        // dd($CheckPrimesio);
         if($listUser->contains($CheckPrimesio))
        {
         
         return $next($request);

        }
         else
         

           return abort(401);

          
    }
}

