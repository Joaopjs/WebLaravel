<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<title>Mensagens</title>
 <style>
 #mns{
	 background-color:#F0FFF0;
	 
 }
 

/* width */
::-webkit-scrollbar {
    width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 7px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #CCF; 
    border-radius: 7px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #6495ED; 
}
</style>

</head>

<body id="bd">

	@if(Auth::check())
                  
         @php 
            foreach($msg as $vendedor){
                $venEmail = $vendedor->email;
                
            }

            $vemail = preg_replace("/[^a-zA-Z0-9\s]/", "", $venEmail);
            $usuario = preg_replace("/[^a-zA-Z0-9\s]/", "", $userEmail);

        @endphp 
                        
            @if($usuario == $vemail)

                <center><h3><a href="{{ route('mensagem')}}" target="_top" style="margin:25px;">Click aqui para ver suas mensagens:</a></h3></center>
                    <script>

                        #bd{
                            width:100px;
                        }
                        
                    </script>
                
            @else
                
                 @foreach($tabuser as $tb)
                    
                        @php

                            $alinhar = "";

                            if(auth()->user()->id == $tb->idcompador){
                              $alinhar = "right";
                              $classe = "text-primary";
                            }else{
                              $alinhar = "left";
                              $classe = "text-success";
                            } 

                            $mensagem = chunk_split($tb->mensagem, 38) ."\n";

                        @endphp 
                              

                            <div class='container'>
                             <div class='row'>
                               <div class='col-sm-12'>
                                <div class="{{$classe}}" align="{{$alinhar}}">
                                    <br />
                                    <font size='1' face='Verdana'>
                                        Nome:
                                    </font> 
                                        {{$tb->enome}}
                                        <br>  
                                        {{$mensagem}}
                                        <br />
                                        <br />
                                    <font size='1' face='Verdana'>
                                        {{Carbon::parse($tb->hora)->diffForHumans()}}<hr>
                                    </font>
                                <div />
                                </div>
                            </div>
                        </div>
                              
                            
                                      
                       @endforeach
                    
                   

            @endif       

	@else
        <h3>Crie Uma conta se <a href="{{route('register')}}" target='_top'>Cadastrar&nbsp; </a>troque mensagens com o vendedor</h3>

	@endif

</body>
</html>
