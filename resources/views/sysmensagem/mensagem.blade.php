@extends('layouts.app')


@section('titulo')
	Mensagens
@stop

@push('conector')

<script type="text/javascript">

  function alterar_div(op) {
      
	var page = op;
	var x;

  	var r = confirm("Voce Realmente Deseja Excluir Este Anuncio!");

  	if (r==true)
    {
        $.ajax({
            url: "{{ route('excluirmessage')}}/"+page,
            method: "GET",
            dataType: "html",
            data: {usuario: page}
        }).done(function(data){
           //faz algo quando enviar certo
			     $('#conteudo').html(window.location.reload());
			 
        }).fail(function(data){
            //faz algo quando der errado
			alert("Erro");
        }); 
    }
  else
    {
      alert("Ação Cancelada:");
    }
  
  }
         
    </script>

@endpush

@section('content')
	
	<h1 class="text-primary" style="padding:7%;">Mensagem</h1>

@foreach($valor as $phone)
       
	<table id='conteudo'>
		<tr>
			<td width='auto'>
				<a href="{{ route('mensagemTib')}}/{{$phone->idproduto}}/{{Crypt::encrypt($phone->remetente)}}/{{Crypt::encrypt($phone->destinatario)}}">
					<img class='img-rounded' src="upload-/{{$phone->fotov}}" id='id' 
					width='100px'
				 	height='100px'>
				</a>
			</td>
			<td width='200px'>
				<div style='margin-left:15px;'>
					<p>nome {{$phone->enome}}</p>
				</div>                                
			</td>
			<td width='60%' align='right'>
				<p style='padding-left:10px;'>
					{{Carbon::parse($phone->hora)->diffForHumans()}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button class="btn btn-default" id="{{$phone->idproduto}}" type="button" 
					onclick="alterar_div('{{$phone->idproduto}}')">Deletar</button>
				</p> 
			</td>
		</tr>
	</table><hr>
@endforeach

	<center>	
		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		    <li class="page-item">
		      <a class="page-link" href="{!! route('mensagem') !!}/{{$ant}}" aria-label="Voltar">
		        <span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span>
		      </a>
		    </li>
		    @for($i = 1; $i <= ceil(count($paginar) / 5); $i++)
		
			    <li class="page-item">
			    	<a class="page-link" href="{!! route('mensagem') !!}/{{$i}}">{{$i}}</a>
			    </li>

		    @endfor

		    <li class="page-item">
		      <a class="page-link" href="{!! route('mensagem') !!}/{{$nx}}" aria-label="Proximo">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</center>

	
@stop