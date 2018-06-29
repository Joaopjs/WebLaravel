<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cookie;
use DB;
use App\User;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        
        if(!empty($user)){
            
            $id_cidade = (empty(auth()->user()->id_cidade)) ? "" : auth()->user()->id_cidade;

            $localizar = DB::select("SELECT C.cidade_t, R.id_regions, R.nomeregiao,
                                   E.id_estadot, E.estado_t
                                   FROM tib_cidade as C 
                                   INNER JOIN tib_regions as R ON C.id_regions = R.id_regions
                                   INNER JOIN tib_estaos AS E ON E.id_estadot = R.id_estadot 
                                                                 && C.id_cidade_t = ?", [$id_cidade]);
        if($id_cidade != ""){
            foreach ($localizar as $key) {
                $idregiao = $key->id_regions;
                $idestado = $key->id_estadot;

                $cidade = $key->cidade_t;
                $regiao = $key->nomeregiao;
                $estado = $key->estado_t;

            }

            $ciy = $id_cidade.",".$cidade;
            $reg = $idregiao.",".$regiao;
            $estado = $idestado.",".$estado;
            
            cookie::queue("estado", $estado, 3600);
            cookie::queue("regiao", $reg, 3600);
            cookie::queue("cidade", $ciy, 3600);
         }   

        }
    }
}
