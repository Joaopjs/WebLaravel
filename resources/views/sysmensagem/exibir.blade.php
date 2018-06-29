<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mensagens</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<style>
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

<body>

	@if(empty($consulta))
        hjhjhjhj

	@else

		@foreach($consulta as $cnt)

			@php

				$alinhar = "";

				if(auth()->user()->id == $cnt->idcompador){
				  $alinhar = "right";
				  $classe = "text-primary";
				}else{
				  $alinhar = "left";
				  $classe = "text-success";
				}  

		        $mensagem = chunk_split($cnt->mensagem, 45);

			@endphp	
				
			<div class='container'>
			     <div class='row'>
				   <div class='col-sm-12'>
					<div class="{{$classe}}" align="{{$alinhar}}">
				      	<br />
						<font size='1' face='Verdana'>
							Nome:
						</font> 
						    {{$cnt->enome}}
							<br>  
							{{$mensagem}}
							<br />
							<br />
						<font size='1' face='Verdana'>
							{{Carbon::parse($cnt->hora)->diffForHumans()}}<hr>
						</font>
					<div />
					</div>
				</div>
			</div>

		@endforeach

	@endif

</body>
</html>