<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;
use Cookie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	\Carbon::setLocale(config('app.locale'));

		if(!(cookie::get('estado'))){
			$estado = "1,Seu Estado";
			$reg = "1,Sua Regiao";
			$ciy = "1,Sua Cidade";
			
			cookie::queue("estado", $estado, 3600);
			cookie::queue("regiao", $reg, 3600);
			cookie::queue("cidade", $ciy, 3600);

		}

        $estaos = DB::select('SELECT estado_t, id_estadot FROM tib_estaos ORDER BY estado_t ASC');
		View::share('estados', $estaos);

			
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
