<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Tib\tib_produto;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use File;
use Cookie;

class PrincipalController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio');
    }



     public function teste()
    {
      
      if(request()->cookie('estado')){
        //dd('setado');
        $var = explode(',', request()->cookie('estado'));
        $var1 = explode(',', request()->cookie('regiao'));
        $var2 = explode(',', request()->cookie('cidade'));
      }else{
        //dd('Nao setado');
        $var = '1,Seu Estado';
        $var1 = '1,Sua Regiao';
        $var2 = '1,Sua Cidade';

        cookie::queue("estado", $var, 3600);
        cookie::queue("regiao", $var1, 3600);
        cookie::queue("cidade", $var2, 3600);

      }


        $estados = DB::select("SELECT * FROM tib_estaos;");

        $regioes = DB::select("SELECT DISTINCT tib_regions.id_regions, tib_regions.nomeregiao FROM tib_regions INNER JOIN tib_estaos WHERE tib_regions.id_estadot = '$var[0]'");


        $cidades = DB::select("SELECT id_cidade_t, cidade_t FROM tib_cidade
                                    WHERE id_regions = '$var1[0]'");


        return view('teste',  ['estados' => $estados,
                                'nome' => $regioes, 
                                'cidades' => $cidades,
                                'var' => $var,
                                'var1' => $var1,
                                'var2' => $var2]);
    }
    

    public function localizar(Request $request){

        if($request->input('estado') != null){
            $estado = $request->input('estado');
        
            $est = $estado;
            $reg = "1,Sua Regiao";
            $ciy = "1,Sua Cidade";
            
            cookie::queue('estado', $est, 3600);
            Cookie::queue(cookie::forget('regiao'));
            Cookie::queue(cookie::forget('cidade'));


        }else if($request->input('regiao') != null){
            $regiao = $request->input('regiao');
            
                        
            cookie::queue("regiao", $regiao, 3600);
            Cookie::queue(cookie::forget('cidade'));

             $sql = "SELECT id_cidade_t, cidade_t FROM tib_cidade
                                        WHERE id_regions = 2";
            
        }else if($request->input('cidade') != null){
            $cidade =  $request->input('cidade');
     
            
            cookie::queue("cidade", $cidade, 3600);
            
        }


         
    }

    public function celular($id = 1)
    {

          //Ajuste de seleção por regioes do pais
          //Seleciona de 5 em 5 com pagina $page1
        //pega o numero da pagina que esta na url
        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id==1){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }


        $selecionar = $this->seleciona(1); //Parametro referente a categoria 1
        $selecionar['seletor'] = $selecionar['seletor']." LIMIT {$page1},5";

        /*DB::table('datas l')->select('l.origin, t.value, l.value, p.value, u.value')
        ->join('datas t', 'l.origin', '=', 't.origin')
        ->join('datas p', 'p.origin', '=', 'l.origin')
        ->join('datas u', 'u.origin', '=', 'l.origin')
        ->where('l.type', 'menuLevel')
        ->where('l.value', 0)
        ->where('t.type', 'menuTitre')
        ->where('p.type', 'menuParent')
        ->where('u.type', 'menuUrl')->get();
        $seletmodel = tib_produto::find(27);
        */
        
        $celulares = DB::select($selecionar['seletor']);

        $paginar = DB::select($selecionar['selet']);       

        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }


        return view('celular ', ['valor' => $celulares, 
                                'paginar' => $paginar, 
                                'nx' => $id + 1,
                                'ant' => $id - 1]);
    }

    public function computador($id = 1){
        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }


        $selecionar = $this->seleciona(2); //Parametro referente a categoria 1
        $selecionar['seletor'] = $selecionar['seletor']." LIMIT {$page1},5";

        $celulares = DB::select($selecionar['seletor']);

        $paginar = DB::select($selecionar['selet']);
        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }

        return view('computador', ['valor' => $celulares, 
                                   'paginar' => $paginar, 
                                   'nx' => $id + 1,
                                   'ant' => $id - 1]);
    }


     public function moveis($id = 1)
     {

        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }


        $selecionar = $this->seleciona(3); 
        $selecionar['seletor'] = $selecionar['seletor']." LIMIT {$page1},5";

        $celulares = DB::select($selecionar['seletor']);

        $paginar = DB::select($selecionar['selet']);
        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }

        return view('moveis', ['valor' => $celulares, 
                                'paginar' => $paginar, 
                                'nx' => $id + 1,
                                'ant' => $id - 1]);
    }

    public function eletrodomesticos($id = 1){

        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }


        $selecionar = $this->seleciona(4); //Parametro referente a categoria 1
        $selecionar['seletor'] = $selecionar['seletor']." LIMIT {$page1},5";

        $celulares = DB::select($selecionar['seletor']);

        $paginar = DB::select($selecionar['selet']);
        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }

        return view('eletrodomesticos', ['valor' => $celulares, 
                                'paginar' => $paginar, 
                                'nx' => $id + 1,
                                'ant' => $id - 1]);

        
    }

    public function brinquedos($id = 1){

        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }


        $selecionar = $this->seleciona(5); //Parametro referente a categoria 1
        $selecionar['seletor'] = $selecionar['seletor']." LIMIT {$page1},5";

        $celulares = DB::select($selecionar['seletor']);

        $paginar = DB::select($selecionar['selet']);
        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }

        return view('brinquedos', ['valor' => $celulares, 
                                    'paginar' => $paginar, 
                                    'nx' => $id + 1,
                                    'ant' => $id - 1]);

    }

    public function games($id = 1){

        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }


        $selecionar = $this->seleciona(6); //Parametro referente a categoria 1
        $selecionar['seletor'] = $selecionar['seletor']." LIMIT {$page1},5";

        $celulares = DB::select($selecionar['seletor']);

        $paginar = DB::select($selecionar['selet']);
        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }

        return view('games', ['valor' => $celulares,
                                'paginar' => $paginar, 
                                'nx' => $id + 1,
                                'ant' => $id - 1]);

        
    }

    public function comprar($pag){

        $valueget = $pag;
        $acti = substr($valueget,1,50);
        $tab = substr($valueget,0,1);

        if($tab == "r"){
          $categoria = "1";
        }else if($tab == "c"){
          $categoria = "2";
        }else if($tab == "m"){
          $categoria = "3";
        }else if($tab == "e"){
          $categoria = "4";
        }else if($tab == "b"){
          $categoria = "5";
        }else if($tab == "g"){
          $categoria = "6";
        }

        $item = DB::select("SELECT P.id_TibItem, P.id_Tib, P.nome_prod, P.telefoneTib, P.descri, 
          P.preco, P.fotoTib, P.data, C.name, C.cidade, C.bairro
          FROM tib_produtos AS P
          INNER JOIN users AS C ON P.id_Tib = C.id && P.id_TibItem = '$acti'");

        return view('comprar', ['item' => $item, 'pg' => $pag]);

    }

    public function subirarquivo(){

        $cat = DB::select("SELECT * FROM tib_categoria;");

        return view('subirarquivo', ['cat' => $cat]);
    }

    public function uploadd(Request $request){

        if ($request->hasFile('file1') && $request->file('file1')->isValid()) {

            $VAR = $request->file('file1')->getClientOriginalName();
            $res = substr($VAR, -20);
            $novo_nome1 = rand(100000, 9999999)."".$res;

            //$upload = $request->file('file1')->store('/', $novo_nome1);
            $upload = $request->file('file1')->move('upload-/', $novo_nome1);
            //Storage::put($novo_nome1, $request->file('file1'));

        }
dd($novo_nome2+"jj");
        if ($request->hasFile('file2') && $request->file('file2')->isValid()) {

            $VAR = $request->file('file2')->getClientOriginalName();
            $res = substr($VAR, -20);
            $novo_nome2 = rand(100000, 9999999)."".$res;

            //$upload = $request->file('file1')->store('/', $novo_nome1);
            $upload = $request->file('file2')->move('upload-/', $novo_nome2);
            //Storage::put($novo_nome2, $request->file('file2'));
        }
        
        if ($request->hasFile('file3') && $request->file('file3')->isValid()) {
            $VAR3 = $request->file('file3')->getClientOriginalName();
            $res3 = substr($VAR3, -20);
            $novo_nome3 = rand(100000, 9999999)."".$res3;

            //$upload = $request->file('file3')->store('/', $novo_nome3);
            $upload3 = $request->file('file3')->move('upload-/', $novo_nome3);
            //Storage::put($novo_nome3, $request->file('file3'));
        }
        
        $novo_nome = $novo_nome1.','.$novo_nome2.','.$novo_nome3;

        $cetegoria = $request->input('menu');
        $idvende = auth()->user()->id;
        $id_cidade = auth()->user()->id_cidade;
        $nome = $request->input('produto');
        $telef = $request->input('telefone');
        $descr = $request->input('descricao');
        $preco = $request->input('preco');

        $resultao = DB::insert("INSERT INTO tib_produtos(id_tibcategory, id_Tib, id_cidade, nome_prod, telefoneTib, descri, preco, fotoTib, data)
         VALUES ('$cetegoria','$idvende', '$id_cidade',
                 '$nome','$telef','$descr','$preco','$novo_nome', NOW());");
        

        return view('home');
    }


    public function meusAnuncios($id = 1){

        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }
        
        if($page1 < 0){
            $page1 = 0;
        }

        $idvende = auth()->user()->id;

        $seletor = DB::select("SELECT P.id_TibItem, P.id_tibcategory, P.nome_prod, P.descri, 
                                P.preco, P.fotoTib,P.telefoneTib
                                FROM tib_produtos AS P
                                INNER JOIN users AS C ON P.id_Tib = C.id  && P.id_Tib
                                 = $idvende LIMIT {$page1},5");

        $paginar = Db::select("SELECT P.id_TibItem
                                FROM tib_produtos AS P
                                INNER JOIN users AS C ON P.id_Tib = C.id  && P.id_Tib
                                 = $idvende");

        $limite = ceil(count($paginar) / 5);
        
        if($id >= $limite){
            $id = $limite - 1;

        }

        return view('MeusAnuncios', ['valor' => $seletor, 
                                     'paginar' => $paginar, 
                                     'nx' => $id + 1,
                                     'ant' => $id - 1]);

        
    }

    public function pesquisar(Request $request, $id = 1)
    {

        //pega o numero da pagina que esta na url

        if($id <= 0){
            $id = 1;                               
        }

        if($id=="" || $id=="1"){

             $page1 = 0;
          }else{
             $page1 = ($id * 5) - 5;  
          }
    
    
        if(empty($request->input('buscar'))){ 

            $prisn = request()->cookie('Item');
            
        }else{

        $prisn = (empty($request->input('buscar'))) 
                  ? request()->cookie('Item')
                  : $request->input('buscar');
    
        if(isset($prisn)){
        cookie::queue('Item', $prisn, 1700); 
        }
    }

    
    $prisn = preg_replace("/[^a-zA-Z0-9\s]/", "", $prisn);
          
                              
           //Ajuste de seleção por regioes do pais
          //Seleciona de 5 em 5 com pagina $page1
          
        $var = explode(',', request()->cookie('estado'));
        $var2 = explode(',', request()->cookie('regiao'));
        $var3 = explode(',', request()->cookie('cidade'));
    
    if($var[1] == "Seu Estado"){
        $seletor = DB::select("SELECT P.id_TibItem, P.data, P.nome_prod, P.descri, P.preco, P.fotoTib, P.telefoneTib, C.cidade_t
                                    FROM tib_produtos AS P
                                    INNER JOIN tib_cidade AS C ON P.id_cidade = C.id_cidade_t && P.nome_prod LIKE  '%$prisn%'
                                    LIMIT {$page1}, 5;");
                    
        $selet = DB::select("SELECT P.id_TibItem
                    FROM tib_produtos AS P
                    INNER JOIN tib_cidade AS C ON P.id_cidade = C.id_cidade_t && P.nome_prod LIKE  '%$prisn%';");            
               
    }else if(!empty($var) && empty($var2) && empty($var3)){
        $seletor = DB::select("SELECT P.id_TibItem, P.nome_prod, P.descri, P.preco, P.data, 
                           P.fotoTib, P.telefoneTib, C.cidade, C.bairro, T.id_regions,
                            E.id_estadot FROM tib_produtos AS P
                                INNER JOIN users AS C ON P.id_Tib = C.id && P.nome_prod LIKE
                                 '%$prisn%'
                                INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                                INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot = $var[0]
                                LIMIT {$page1},5;");
                    
        $selet = DB::select("SELECT P.id_TibItem
                                    FROM tib_produtos AS P
                                    INNER JOIN users AS C ON P.id_Tib = C.id && P.nome_prod LIKE '%$prisn%'
                                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot = $var[0]
                                    ;");            

    }else if(!empty($var) && !empty($var2) && empty($var3)){
       $seletor = DB::select("SELECT P.id_TibItem, P.nome_prod, P.descri, P.preco, P.fotoTib, P.data, 
                                   P.telefoneTib, C.cidade, C.bairro, T.id_regions, E.id_estadot
                                   FROM tib_produtos AS P
                                   INNER JOIN users AS C ON P.id_Tib = C.id && P.nome_prod LIKE '%$prisn%'
                                   INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                                   INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot = $var[0] && E.id_regions = $var2[0] 
                                   LIMIT {$page1},5;");
                    
       $selet = DB::select("SELECT P.id_TibItem
                                   FROM tib_produtos AS P
                                   INNER JOIN users AS C ON P.id_Tib = C.id && P.nome_prod LIKE '%$prisn%'
                                   INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                                   INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot = $var[0] && E.id_regions = $var2[0] 
                                   ;");             
                        
    }else if(!empty($var) && !empty($var2) && !empty($var3)){
        $seletor = DB::select("SELECT P.id_TibItem, P.nome_prod, P.descri, 
                                    P.preco, P.fotoTib, P.data, 
                                    P.telefoneTib, C.cidade, C.bairro, T.id_regions, E.id_estadot
                                    FROM tib_produtos AS P
                                    INNER JOIN users AS C ON P.id_Tib = C.id && P.nome_prod LIKE '%$prisn%'
                                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot = $var[0] && E.id_regions = $var2[0] 
                                    && T.id_cidade_t = $var3[0]
                                    LIMIT {$page1},5;");
                    
         $selet = DB::select("SELECT P.id_TibItem
                                     FROM tib_produtos AS P
                                     INNER JOIN users AS C ON P.id_Tib = C.id && P.nome_prod LIKE '%$prisn%'
                                     INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                                     INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot = $var[0] && E.id_regions = $var2[0] 
                                     && T.id_cidade_t = $var3[0]
                                     ;");           
                        
    } 



        $limite = ceil(count($selet) / 5);
        
        if($id > $limite){
            $id = $limite - 1;

        }

        return view('pesquisa', ['valor' => $seletor, 
                                'paginar' => $selet, 
                                'nx' => $id + 1,
                                'ant' => $id - 1]);

       
    }


    function seleciona($categotia){
      if(request()->cookie('estado') != null){
        $var = explode(',', request()->cookie('estado'));        

      }else if(request()->cookie('regiao') != null){
        $var2 = explode(',', request()->cookie('regiao'));

      }else{
        $var2 = explode(',', request()->cookie('regiao'));
        $var3 = explode(',', request()->cookie('cidade'));

      }

            $page1 = 1;

            if($var[1] == "Seu Estado"){
                $seletor = "SELECT P.id_TibItem, P.id_Tib, P.nome_prod, P.telefoneTib, P.descri, P.preco, P.fotoTib, P.data, C.cidade, C.bairro
                    FROM tib_produtos AS P
                    INNER JOIN users AS C ON P.id_Tib = C.id && id_tibcategory    = '$categotia' 
                    ORDER BY P.id_TibItem DESC";
                    
                $selet = "SELECT id_TibItem FROM tib_produtos WHERE id_tibcategory = '$categotia';";

                $selecionar = array(
                                    'seletor' => $seletor,
                                    'selet' => $selet
                                    );              
                   
            }else if(!empty($var) && empty($var2) && empty($var3)){
                $seletor = "SELECT P.id_TibItem, P.id_Tib, P.nome_prod, P.telefoneTib, 
                    P.descri, P.preco, 
                    P.fotoTib, P.data, C.cidade, C.bairro, T.id_regions, E.id_estadot
                    FROM tib_produtos AS P
                    INNER JOIN users AS C ON P.id_Tib = C.id && id_tibcategory = $categotia
                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot
                     = $var[0]
                    ORDER BY P.id_TibItem DESC 
                    ";
                    
                $selet = "SELECT P.id_TibItem
                    FROM tib_produtos AS P
                    INNER JOIN users AS C ON P.id_Tib = C.id && id_tibcategory = '$categotia'
                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot
                     = '$var[0]';";

                    $selecionar = array(
                                    'seletor' => $seletor,
                                    'selet' => $selet
                                    );
            
            }else if(!empty($var) && !empty($var2) && empty($var3)){
               $seletor = "SELECT P.id_TibItem, P.id_Tib, P.nome_prod, P.telefoneTib, P.descri, P.preco, P.fotoTib, P.data, 
                    C.cidade, C.bairro, T.id_regions, E.id_estadot
                    FROM tib_produtos AS P
                    INNER JOIN users AS C ON P.id_Tib = C.id && id_tibcategory = $categotia
                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot 
                    = $var[0] && E.id_regions = $var2[0]
                    ORDER BY P.id_TibItem DESC 
                    ";
                    
               $selet = "SELECT P.id_TibItem, P.id_Tib, P.nome_prod, P.telefoneTib, P.descri, P.preco, P.fotoTib, 
               P.data, 
                    C.cidade, C.bairro, T.id_regions, E.id_estadot
                    FROM tib_produtos AS P
                    INNER JOIN users AS C ON P.id_Tib = C.id && id_tibcategory = $categotia
                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot
                     = $var[0] && 
                    E.id_regions = $var2[0];"; 

                    $selecionar = array(
                                    'seletor' => $seletor,
                                    'selet' => $selet
                                    );    
                                
           }else if(!empty($var) && !empty($var2) && !empty($var3)){
                $seletor = "SELECT P.id_TibItem,  P.id_Tib, P.nome_prod, P.telefoneTib, P.descri, P.preco, P.fotoTib, P.data, 
                    C.cidade, C.bairro, T.id_regions, E.id_estadot
                    FROM tib_produtos AS P
                    INNER JOIN users AS C ON P.id_Tib = C.id && id_tibcategory = $categotia
                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot
                     = $var[0] &&
                     E.id_regions = $var2[0] 
                    && T.id_cidade_t = $var3[0] ORDER BY P.id_TibItem DESC 
                    ";
                    
                $selet = "SELECT P.id_TibItem, P.id_Tib, P.nome_prod, P.telefoneTib, P.descri, P.preco, P.fotoTib,
                 P.data, 
                    C.cidade, C.bairro, T.id_regions, E.id_estadot
                    FROM tib_produtos AS P
                    INNER JOIN users AS C ON P.id_Tib = C.id && id_tibcategory = $categotia
                    INNER JOIN tib_cidade AS T ON T.id_cidade_t = P.id_cidade
                    INNER JOIN tib_regions AS E ON T.id_regions = E.id_regions && E.id_estadot
                     = $var[0] && 
                    E.id_regions = $var2[0] 
                    && T.id_cidade_t = $var3[0];";

                    

                    $selecionar = array(
                                    'seletor' => $seletor,
                                    'selet' => $selet
                                    );

                                
            }

            return $selecionar;

    }


}
