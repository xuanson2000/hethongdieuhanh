<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Admin;
use App\quantri;
use Hash;


class admincontroller extends Controller
{
    // ddawng nhập https://viblo.asia/p/tao-authentication-rieng-de-check-dang-nhap-trong-laravel-63vKj0WVl2R

   public function getlogin(){

     return view('trangchu.login');

   }


    public function postlogin(Request $request)

    {

        $this->validate($request,
            ['username'=> 'required',
            'password'=> 'required|min:6|max:20',

        ],[
           'username.required'=>'Vui long nhap lại email',


           'password.required'=>'Vui long nhap lại mat khẩu',
           'password.min'=>'password min',
           'password.max'=>'passwword max',

       ]
       );

        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        
        if (Auth::guard('admin')->attempt($arr)) {
            $item=Auth::guard('admin')->user()->password_change_at;
            $itemid=Auth::guard('admin')->id();

            if( $item==null)
            {
                 return redirect()->route('reset-user',[$itemid]);

            }
            else{

                if(Auth::guard('admin')->user()->index==1){

                     return redirect()->route('quantri');
                }else if(Auth::guard('admin')->user()->index==2){

                 return redirect()->route('trangchutrungtam');

                }else
                {
                 return redirect()->route('nghiemthuindex');

                }


               
             

            }   

        } else {

          // dd('tài khoản và mật khẩu chưa chính xác');

           return redirect()->back()->with('logina','Tài khoản hoặc mật khẩu không đúng !');

        }



    }

     public function shownhaplaiForm($id)
    {

     $admin=Admin::find($id);

     return view('trangchu.doimatkhau',['admin'=>$admin]);

    }

      public function nhaplai(Request $require,$id){


         $this->validate($require,
            
         [ 'username' => 'bail|required',
          'password'=> 'required|min:6|max:20',
          'compassword' => 'bail|required|same:password',

        ],[
           'username.required'=>'Vui long nhap lại email',
           'password.required'=>'Vui long nhap lại mat khẩu',
           'compassword.same'=>'Comfim mật khẩu không đúng',
           'password.min'=>'password min',
           'password.max'=>'passwword max',
       ]
       );
   
        
        $use_create = Admin::find($id);
        $use_create->username= $require->username;
        $use_create->password= Hash::make($require->password);
        $use_create->password_change_at= '1';
        $use_create->save();
   
        return redirect()->route('loginUser');
     }


        public function getlogout(){
            Auth::logout();
          return redirect()->route('loginUser');

   }
   
        public function getlogoutdangnhap(){
            Auth::logout();
          return redirect()->route('trungtamtatrangchu');

   }


    // vào trang chủ quản trị nguoi dung

    public function index(){

     return view('admin.layout.main');

    }

    public function getdangnhap(){

     return view('trangchu.dangnhaquantri');

    }
    
    public function postdangnhap(Request $request)

    {

      $this->validate($request,
        ['username'=> 'required',
        'matkhau'=> 'required|min:6|max:20',

      ],[
        'username.required'=>'Vui long nhap lại tài khoản',
       'matkhau.required'=>'Vui long nhap lại mat khẩu',
       'matkhau.min'=>'password min',
       'matkhau.max'=>'passwword max',

     ]
   );

      $arr = [
        'username' => $request->username,
        'password' => $request->matkhau,
      ];

      if (Auth::guard('quantri')->attempt($arr)) {

        $item=Auth::guard('quantri')->user()->truycap;
        $itemid=Auth::guard('quantri')->id();

        if( $item==null)
        {
         return redirect()->route('reset_dangnhap',[$itemid]);
       }
       else{


        if(Auth::guard('quantri')->user()->chuyengia==1){
           

           return redirect()->route('wp_admin');
       }else if(Auth::guard('quantri')->user()->chuyengia==2){

           return redirect()->route('trangchutrungtam');

       }else
       {
           return redirect()->route('nghiemthuindex');

       }

       
       
      }   

    } else {

           // dd('tài khoản và mật khẩu chưa chính xác');

      return redirect()->back()->with('loginb','Tài khoản hoặc mật khẩu không đúng!');

    }
  }






    public function reset_dangnhap($id){
      $admin=quantri::find($id);

     return view('trangchu.resetdangnhap',['admin'=>$admin]);

    }
    
   public function reset_dangnhappost(Request $require,$id){


         $this->validate($require,
            
         [ 'username' => 'bail|required',
          'password'=> 'required|min:6|max:20',
          'compassword' => 'bail|required|same:password',

        ],[
           'username.required'=>'Vui long nhap lại email',
           'password.required'=>'Vui long nhap lại mat khẩu',
           'compassword.same'=>'Comfim mật khẩu không đúng',
           'password.min'=>'password min',
           'password.max'=>'passwword max',
       ]
       );
   
        
        $use_create = quantri::find($id);
        $use_create->username= $require->username;
        $use_create->password= Hash::make($require->password);
        $use_create->truycap= '1';
        $use_create->save();
   
         return redirect()->route('dangnhap');
     }

}

