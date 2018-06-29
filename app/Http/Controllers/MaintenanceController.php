<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;

class MaintenanceController extends Controller
{
    public function deletar($id = 1){

		$valueget = $id;
		$meuId = auth()->user()->id;
						  
		$seleFoto = DB::select("SELECT fotoTib
                                FROM tib_produtos WHERE	
                                id_TibItem	= '$valueget'
                        		&& id_Tib       = '$meuId';");
		
		foreach($seleFoto as $dat)
		{
			  $foto = $dat->fotoTib;			  
			  
		}
		
		$linkes = explode(",", $foto);


	    File::delete("upload-/".$linkes[0]);
	    File::delete("upload-/".$linkes[1]);
	    File::delete("upload-/".$linkes[2]);
	    
	
		$sql = DB::statement("DELETE FROM tib_produtos WHERE id_TibItem = '$valueget'
														&& id_Tib = '$meuId';"); 

    }

    public function editar(){

    	
    }
}
