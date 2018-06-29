<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>
<meta charset="utf-8" />
<link rel="shortcut icon" href="imagens/logolink.png" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

@stack('conector')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<link rel="icon" href="imagens/3_White_logo_on_color1_216x65.png"/>

@yield('actionname')
    
<script type="text/javascript">

function SelecionarEstado(){
    
    
        var estado = $("#estado").val(); 
       
        $.ajax({
            url: "localizar",
            method: "GET",
            dataType: "html",
            data: {estado: estado}
        }).done(function(data){
           //faz algo quando enviar certo
                 $('#conteudo').html(window.location.reload());
             
        }).fail(function(data){
            //faz algo quando der errado
            alert("Erro");
        });    

}

function SelecionarRegiao(){
    

        var regiao = $("#regiao").val();
        
        $.ajax({
            url: "localizar",
            method: "GET",
            dataType: "html",
            data: {regiao:regiao}
        }).done(function(data){
           //faz algo quando enviar certo
                 $('#conteudo').html(window.location.reload());
             
        }).fail(function(data){
            //faz algo quando der errado
            alert("Erro");
        }); 

}

function SelecionarCidade(){

        var cidade = $("#cidade").val();
        
        $.ajax({
            url: "localizar",
            method: "GET",
            dataType: "html",
            data: {cidade:cidade}
        }).done(function(data){
           //faz algo quando enviar certo
                 $('#conteudo').html(window.location.reload());
             
        }).fail(function(data){
            //faz algo quando der errado
            alert("Erro");
        }); 

}

  </script>


<style>

  #login{
      display:none;
    }

  .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
        font-family: 'Raleway', sans-serif;
                text-transform: uppercase;
            }

  @media(max-width:340px){
    #bemvindo{
      display: none;
    }
  }

  @media(max-width:770px){
    #login{
      display: block;
    }

    #adsense{
      display: none;

    }

    #bl1{
      width:80%;
    }

    #prop{
      display:none;
    }
    
    .dropdown {
    position: relative;
    display: inline-block;
    }
    
    .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
        font-family: 'Raleway', sans-serif;
                text-transform: uppercase;
            }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      padding: 12px 16px;
      z-index: 1;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    #estado{
      width:80%;
    } 
    
    #regiao{
      width:80%;
    }
    
    #cidade{
      width:80%;
    }
    
    #principal{
      height:200px;
    }
    
  } 

</style>

</head>
<body style="padding:1%;">
  
@if(Request::is('register') != 1)
<div id="conteudo">

</div>
@endif

<nav class="navbar navbar-light bg-faded list-inline" style="background:#F0FFF0;">
  <div id="contentHeader">
<div style="display:inline; padding:2%;" class="cor">

  <a href="{{ route('Homes')}}"><img src="{{ asset('images/1_Primary_logo_on_transparent_216x65.png') }}" width="150" height="45"/></a>
      <div style="float:right; margin-top:5px;">
         <div style="padding:2%; display:inline;"> 
                      
            
             <font style="color:#6495ED;"><b id="bemvindo">Bem vindo</b> @if(Auth::check()) 
                        &nbsp;<b>{{auth()->user()->name}}</b> 
                       @endif 
                       &nbsp;&nbsp;&nbsp;&nbsp;</font>
                                           
        </div>
     </div>                       
                           
 </div> 
 <br /> 
 <br />
 <br />
 <br />

  <div align="right" style="margin-right: 2.5%; margin-bottom: 2%;" id="login">
    

                <!-- Right Side Of Navbar -->
                
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <div style="display: inline">
                        <a href="{{ url('/login') }}">Login</a>&nbsp&nbsp&nbsp&nbsp
                        
                        <a href="{{ url('/register') }}">Register</a>
                    </div>    
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Sair <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
               
  </div>  


       <div class="collapse navbar-collapse" id="app-navbar-collapse" style="margin-right: 2%;">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Sair <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
</div>
<nav class="navbar navbar-default" style="background-color:#6495ED; margin-top:.5%">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand " href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          @if(Auth::check())
             <li ><a href="{{ route('Homes')}}"><font size='3' color='#FFFFFF'><b>Inicio</b></font><span class='sr-only'>(current)</span></a> </li>
             <li><a href="{{ route('mensagem')}}"><font size='3' color='#FFFFFF'><b>Mensagens</b></font></a></li>
             <li><a href="{{ route('subirarquivo')}}"><font size='3' color='#FFFFFF'><b>Subir Arquivos</b></font> </a></li>
             <li><a href="{{ route('MeusAnuncios')}}"><font size='3' color='#FFFFFF'><b>Meus Anuncios</b></font></a></li>
             <li><a href="{{ route('Contato')}}"><font size='3' color='#FFFFFF'><b>Contato</b></font></a></li>
          @else
             <li ><a href="{{ route('Homes')}}"><font size='3' color='#FFFFFF'><b>Inicio</b></font><span class='sr-only'>(current)</span></a> </li>
             <li><a href="{{ route('Contato')}}"><font size='3' color='#FFFFFF'><b>Contato</b></font></a></li>
          @endif
       </ul>
      <div style="float:right;">
      
        
       <form class="navbar-form navbar-left" method="get" action="{{ route('pesquisar')}}" enctype="multipart/
      form-data">

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="buscar" />
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">Procurar</button>
      </form>
       </div>     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
</nav>
  <div id="localizar">
    @if(Request::is('register') != 1)
        {!! app(App\Http\Controllers\PrincipalController::class)->teste(app('request')) !!}
    @endif
  </div>
    <div class="container-fluid">   
    <div class="row">
        <div class="col-sm-2">
          <div id="catg">
           <div class="dropdown" >
                  <span><h4 class="text-primary" style="padding:5%;">Categoria</h4></span>
                  <div class="dropdown-content">
                    <center>
                      <ul class="list-group">
                            <li class="list-group-item disabled"><a href="{{route('Celular')}}">Celulares</a></li>
                            <li class="list-group-item"><a href="{{route('Computador')}}">Computadores</a></li>
                            <li class="list-group-item"><a href="{{route('Moveis')}}">Moveis</a></li>
                            <li class="list-group-item"><a href="{{route('Eletrodomesticos')}}">eletrodomesticos</a></li>
                            <li class="list-group-item"><a href="{{route('Brinquedos')}}">Brinquedos</a></li>
                            <li class="list-group-item"><a href="{{route('Games')}}">Video Games</a></li>
                      </ul> 
                    </center>
                  </div>
           </div>
         </div>
           <br />
              
        </div>
        <div class="col-sm-7">
        <div id="fot">
          <img src="{{ asset('images/aperto-de-maos.jpg')}}" id="principal" width="100%" height="300px">
        </div>      
       
          @if(Request::is('register') != 1)
             <br />
             <br />
          @endif
            @yield('content')

       </div>
       <div class="col-sm-3" id="adsense">
            <div id="prop">
            
            
            </div>
       </div>      
    </div>
</div>
        
        
         
         <div style="padding-top:10%; min-height: 500px;"><footer style="font-size:9px; background:#69F; padding:20px;">Comercio OTIB ganhe sem sair de casa.</footer></div>
                        
            
</body>
</html>