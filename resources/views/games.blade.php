@extends('layouts.app')


@section('titulo')
	Games
@stop

@section('content')
	
	<h1 class="text-primary" style="padding:7%;">Games</h1>

	@foreach($valor as $phone)
		@php
			$linkes = explode(",", $phone->fotoTib); //Coleta os linkes das imagens
		@endphp	

		<table >
	       <tr>
	         <tr>                           
	         <td width="auto">
	            <a href="{{ route('comprar')}}/{{$page}}" ><img class="img-rounded" src='{{ asset("upload-/".$linkes[0]."")}}' id='id' width='100px' height='100px'></a>
	         </td>
	         <td width='35%'>
	            <a href="{{ route('comprar')}}/{{$page}}" ><p>&nbsp;&nbsp;&nbsp;&nbsp;{{$phone->nome_prod}}</p></a>
	            <a href="{{ route('comprar')}}/{{$page}}" ><p>&nbsp;&nbsp;&nbsp;&nbsp;R$ {{$phone->preco}}
	            </p></a>                               
	         </td>
	         <td width='60%' align='right'>
	         	{{Carbon::parse($phone->data)->diffForHumans()}}
	            <a href="{{ route('comprar')}}/{{$page}}" ><p style='padding-left:10px;'>{{$phone->cidade}}&nbsp;&nbsp;</p></a>
	         </td> 
	    </table> <hr>
	@endforeach

	<center>	
		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		    <li class="page-item">
		      <a class="page-link" href="{!! route('Games') !!}/{{$ant}}" aria-label="Voltar">
		        <span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span>
		      </a>
		    </li>
		    @for($i = 1; $i <= ceil(count($paginar) / 5); $i++)
		
			    <li class="page-item">
			    	<a class="page-link" href="{!! route('Games') !!}/{{$i}}">{{$i}}</a>
			    </li>

		    @endfor

		    <li class="page-item">
		      <a class="page-link" href="{!! route('Games') !!}/{{$nx}}" aria-label="Proximo">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</center>

@stop