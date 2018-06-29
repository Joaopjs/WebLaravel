@extends('layouts.app')

@section('titulo')
	Celulares
@stop

@section('content')

<h1 id="conteudo" class="text-primary" style="padding:5%;">Mensagens</h1>


	<div align='right' style='padding-top:5%; padding-right:15%;'>
		<h1 class='text-primary'>Tiby Chat</h1>	
	</div>

	@foreach($consulta as $cns)
						
		<div style='padding:6%;'>
			<div align='left' style='padding-left:15%'>
				<p>Vendedor &nbsp; {{$cns->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefone: {{$cns->telefoneTib}}
				</p>
			</div>
							
			<center> 
				<div class='panel panel-default'>
					<iframe id='chat' src="{{ route('chatForm')}}/{{$pg}}/{{$res}}/{{$des}}" 
					  width='100%' height='400px' name='chat' scrolling='no' style='padding:inherit' frameborder='0'>
					</iframe>
				</div>	
			</center>
				                        	
                        
						
						
				Informações Sobre o Item&nbsp; 
			<a href="{{ route('comprar')}}/{{$pg}}">
			    Aqui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    </a>

		</div>		

				@endforeach
						
					
					
@stop 