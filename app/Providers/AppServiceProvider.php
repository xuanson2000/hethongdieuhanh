<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\khoa;
use App\khoahoc;
use App\lophoc;

use App\sinhvien;
use App\diem;
use App\mohoc;
use App\hocky;
use App\loaidiem;
use App\lanthi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

         view()->composer('QLDT.tracuu', function($view){
          //  $loai_sp=ProductType::all();
            $khoa=khoa::all();
            $khoahoc=khoahoc::all();

            $view->with(['khoa' => $khoa,'khoahoc' => $khoahoc]);
        });

          view()->composer('QLDT.paypersinhvien', function($view){
          //  $loai_sp=ProductType::all();
            $khoa=khoa::all();
            $khoahoc=khoahoc::all();
            $lop =lophoc::all();

            $view->with(['khoa' => $khoa,'khoahoc' => $khoahoc,'lop'=>$lop]);
        });


          view()->composer('QLD.payper', function($view){
          //  $loai_sp=ProductType::all();
            $khoa=khoa::all();
            $khoahoc=khoahoc::all();
            $lop =lophoc::all();
              $sinhvien=sinhvien::all();
              $monhoc=mohoc::all();
          
              $hocky=hocky::all();
             $loaidiem=loaidiem::all();
             $lanthi=lanthi::all();

            $view->with(['lanthi'=>$lanthi,'khoa'=>$khoa,'khoahoc'=>$khoahoc,'lop'=>$lop,'monhoc'=>$monhoc,'hocky'=>$hocky,'loaidiem'=>$loaidiem]);
        });



          view()->composer('TK.payper1', function($view){
          //  $loai_sp=ProductType::all();
            $khoa=khoa::all();
            $khoahoc=khoahoc::all();
            $lop =lophoc::all();
            $sinhvien=sinhvien::all();
            $monhoc=mohoc::all();
            $hocky=hocky::all();
          
            $view->with(['khoa'=>$khoa,'khoahoc'=>$khoahoc,'lop'=>$lop,'monhoc'=>$monhoc,'hocky'=>$hocky]);
        });

    }
}
