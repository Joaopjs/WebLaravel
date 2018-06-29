<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;


class MensagemController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    } 

    public function formulario($page = 1, $foto = 1){

    	return view('sysmensagem.formulario', ['pg'   => $page,
    										   'foto' => $foto]);
    } 

    public function exibirform($page = 1){

		$idpro = substr($page,1,50);
		$tab = substr($page,0,1);
		(Auth::check()) ? $userEmail = auth()->user()->email : $userEmail = '';
		$usuario = preg_replace("/[^a-zA-Z0-9\s]/", "", $userEmail);


		if($tab == "r"){
		$cetegoria = "1";
		}else if($tab == "c"){
			$cetegoria = "2";
		}else if($tab == "m"){
			$cetegoria = "3";
		}else if($tab == "e"){
			$cetegoria = "4";
		}else if($tab == "b"){
			$cetegoria = "5";
		}else if($tab == "g"){
			$cetegoria = "6";
		}

		$msg = DB::select("SELECT C.id, C.name, C.email
							FROM users AS C
							INNER JOIN tib_produtos AS P ON P.id_TibItem = 
							? && P.id_Tib = C.id;", [$idpro]);

		foreach($msg as $u){
             $emailVendedor = $u->email;

		}

        $vemail = preg_replace("/[^a-zA-Z0-9\s]/", "", $emailVendedor);
        $usuario = preg_replace("/[^a-zA-Z0-9\s]/", "", $userEmail);

        if(!isset($userEmail)){
        	return "jkjkjkjjk";/*view('sysmensagem.exibirform', [ 'msg' => $msg,
    											 'pg' => $page,
    											'logar' => true]);*/

        }

		if($userEmail != $emailVendedor){

		   $tabuser = DB::select("SELECT * FROM $usuario
						   		  WHERE remetente = '$usuario'
						   		  AND destinatario =  '$vemail'
						   		  AND idproduto =  '$page'
						   		  ORDER BY id_chat DESC 
						   		  LIMIT 30;");
		   //abaixo estou mostrando em tela os dados do bd
          

		}else{
			$tabuser = "abobora";
		}

    	return view('sysmensagem.exibirform', [ 'msg' => $msg,
    											 'pg' => $page,
    											'userEmail' => $userEmail,
    											'tabuser' => $tabuser]);
    } 

    public function mensagem($id = 1){



		$meemail = auth()->user()->email;
				
    	/*$idusua = auth()->user()->id;
 		$name = auth()->user()->name;
 		*/

 		$meemail = preg_replace("/[^a-zA-Z0-9\s]/", "", $meemail);

    	if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }


        $celulares = DB::select
                    ("SELECT DISTINCT idproduto, enome, vendedor, fotov, remetente, destinatario, hora FROM ".$meemail." GROUP BY idproduto ORDER BY id_chat DESC LIMIT {$page1},5;");


        $paginar = Db::select("SELECT DISTINCT idproduto, remetente FROM ".$meemail);       

        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }
     	

    	return view('sysmensagem.mensagem', ['valor' => $celulares, 
			                                 'paginar' => $paginar, 
			                                 'nx' => $id + 1,
			                                 'ant' => $id - 1,
			                             	  'pg' => $id]);
    } 

    public function contato(){
     	

    	return view('sysmensagem.contato');
    } 

    public function sendMensagem(Request $request){
     	
    	$valueget = $request->input('page');
		$tibfoto = $request->input('foto');
		$meemail = auth()->user()->email;
		$idpro = substr($valueget,1,50);
		$tab = substr($valueget,0,1);
				
    	$idusua = auth()->user()->id;
 		$name = auth()->user()->name;		

		
		$consulta = DB::select("SELECT P.id_TibItem, C.id, C.name, C.email
                                    FROM users AS C
                                    INNER JOIN tib_produtos AS P ON P.id_TibItem = '$idpro' && C.id = P.id_Tib");
									

		foreach($consulta as $l){
			$vededor = $l->id;
			$nvend =  $l->name;
			$tibmail =  $l->email;

		}	
		
				
		$tibmail = preg_replace("/[^a-zA-Z0-9\s]/", "", $tibmail);
		$meemail = preg_replace("/[^a-zA-Z0-9\s]/", "", $meemail);
        
        $mensagem = $request->input('mensagem');

        
        //acima estou pegando o que foi digitado pelo usuário la no formulario
			
		if($meemail != $tibmail){                          //sender
			DB::insert("INSERT INTO ".$tibmail." (enome, idcompador, remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) 
					    VALUES('$name' , '$vededor', '$meemail', '$tibmail',
					           '$mensagem', '$valueget', '$nvend', '$tibfoto', NOW());");
               	
			DB::insert("INSERT INTO ".$meemail."(enome, idcompador, remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) 
					    VALUES('$name', '$idusua', '$meemail', '$tibmail', '$mensagem', '$valueget',
					     '$nvend', '$tibfoto', NOW())");
		}else{
			return "<script type='text/javascript'> 
						alert('Você nao pode enviar mensagem a si mesmo:');
					</script>"; 
		}				
          
        return view('sysmensagem.formulario', ['pg'   => $valueget,
    										   'foto' => $tibfoto]);     
    	
    }

    public function mensagemTib($id = 1, $res = 1, $des = 1){
    	$valueget = $id;
		$acti = substr($valueget,1,50);
			
		
		//$res = Crypt::decrypt($res);
		//$des = Crypt::decrypt($des);


        $consulta = DB::select("SELECT P.id_TibItem, P.nome_prod, P.descri, P.preco,
                                P.fotoTib, C.name, P.telefoneTib
								FROM tib_produtos AS P
								INNER JOIN users AS C ON id_TibItem = '$acti' && 
								P.id_Tib = C.id;");

     	

    	return view('sysmensagem.mensagemTib', ['pg' => $id,
    											'consulta' => $consulta,
    											'res' => $res,
    											'des' => $des]);
    }

    public function excluirmessage($id = 1){

 		$valueget = $id;
		$meemail = auth()->user()->email;
		$meemail = preg_replace("/[^a-zA-Z0-9\s]/", "", $meemail);
	
		$sql = DB::statement("DELETE FROM ".$meemail." WHERE idproduto = '$valueget';"); 
 
    } 

    public function chatForm($id = 1, $res = 1, $des = 1){

    	
    	return view('sysmensagem.chatForm', ['id' => $id,
    										 'res' => $res, 
    										 'des' => $des]);
    }

    public function exibir($id = 1, $res = 1, $des = 1){

    	$valueget = $id;
		
		$idusua = auth()->user()->id;
		
		$Descriptografado = Crypt::decrypt($res);
		$Descripdest = Crypt::decrypt($des);
		$myname = auth()->user()->name;


		$usuario = auth()->user()->email;

		$usuario = preg_replace("/[^a-zA-Z0-9\s]/", "", $usuario);

		$consulta = DB::select("SELECT * 
				       				FROM $usuario
									WHERE remetente = '$Descriptografado'
									AND destinatario =  '$Descripdest'
									AND idproduto =  '$valueget'
									ORDER BY id_chat DESC 
									LIMIT 25;");

    	return view('sysmensagem.exibir', ['consulta' => $consulta,
    									   'usuario' => $usuario]);
    }

    public function chatinsert(Request $request, $id = 1, $res = 1, $des = 1){

  
				        $valueget = $id;
						$meemail = auth()->user()->email;
						$idpro = substr($valueget,1,50);
				
						$idusua = auth()->user()->id;
						
				 		$name = auth()->user()->name;	
						
						$Descriptografado = Crypt::decrypt($res);
						$Descripdest = Crypt::decrypt($des);			
				
				$consulta = DB::select("SELECT P.id_Tib, C.id, C.name, C.email
                       FROM tib_produtos AS P
                       INNER JOIN users AS C ON P.id_TibItem = $idpro && P.id_Tib = C.id;");
				

				foreach ($consulta as $key) {
					$vededor = $key->id;
					$nvend =  $key->name;
					$tibmail =  $key->email;
					
				}
					
				$meemail = preg_replace("/[^a-zA-Z0-9\s]/", "", $meemail);
				$tibmail = preg_replace("/[^a-zA-Z0-9\s]/", "", $tibmail);
				
                
                $mensagem = $request->input('mensagem');
                
                //acima estou pegando o que foi digitado pelo usuário la no formulario
				
     if($meemail != $tibmail){                          //sender
	    DB::insert("INSERT INTO ".$tibmail."(enome, idcompador, remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$idusua', '$Descriptografado', '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());");
	 
		DB::insert("INSERT INTO ".$meemail."(enome, idcompador,  remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$idusua', '$Descriptografado',
			  '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());");
	 }else{
	    DB::insert("INSERT INTO ".$Descriptografado."(enome, idcompador, remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$idusua',
	   '$Descriptografado', '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());");
	 
		DB::insert("INSERT INTO ".$meemail."(enome, idcompador,  remetente, destinatario, mensagem, idproduto, vendedor, fotov, hora) VALUES('$name', '$idusua', '$Descriptografado', 
			 '$tibmail', '$mensagem', '$valueget', '$nvend', 'tibfoto', NOW());");
		
		
		
	 }
				 
		
		
				return view('sysmensagem.chatForm', ['id' => $id,
    										 'res' => $res, 
    										 'des' => $des]);
	}

}
