<?php

namespace App\Providers;

use App\Kullanici;
use App\Models\Kategori;
use App\Models\Siparis;
use App\Models\Urun;
use Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //$bitisZamani = now()->addMinutes(10);
        //$istatistikler = Cache::remember('istatistikler', $bitisZamani,function (){
        //    return [
        //        'bekleyen_siparis'=>Siparis::where('durum','Siparişiniz alındı')->count()
        //    ];
        //});
        //View::share('istatistikler',$istatistikler);

        View::composer(['yonetim.*'],function ($view){
            $bitisZamani = now()->addMinutes(10);
            $istatistikler = Cache::remember('istatistikler', $bitisZamani,function (){
                return [
                    'bekleyen_siparis'=>Siparis::where('durum','Siparişiniz alındı')->count(),
                    'tamamlanan_siparis'=>Siparis::where('durum','Siparişiniz tamamlandı')->count(),
                    'toplam_urun'=>Urun::count(),
                    'toplam_kategori'=>Kategori::count(),
                    'toplam_kullanici'=>Kullanici::count()
                ];
            });

            $view->with('istatistikler',$istatistikler);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
