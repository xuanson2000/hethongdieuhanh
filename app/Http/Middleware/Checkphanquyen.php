<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\quyen;
use Illuminate\Support\Facades\Auth;

class Checkphanquyen
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
             $listUser = DB::table('quantri')
            ->join('quantri_vaitro', 'quantri.id', '=', 'quantri_vaitro.qt_id')
            ->join('vaitro', 'quantri_vaitro.vt_id','=', 'vaitro.id')
            ->where('qt_id', Auth::guard('quantri')->id())
            ->select('vaitro.*')
            ->get()->pluck('id')->toArray();
            /// lấy ra quyền 

             $listUser = DB::table('vaitro')
            ->join('vaitro_quyen','vaitro.id', '=','vaitro_quyen.vt_id')
            ->join('quyen', 'vaitro_quyen.quyen_id', '=', 'quyen.id')
            ->whereIn('vaitro.id', $listUser)
            ->select('quyen.*')
            ->get()->pluck('id')->unique();

        //lấy id màn hình đang dăng nhap vào màn hìn

        $CheckPrimesio = quyen::where('name',$permission)->value('id');
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
