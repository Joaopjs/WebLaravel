@extends('layouts.app')


@section('titulo')
	Meus Anuncios
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
            url: "{{ route('deletar')}}/"+page,
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
	
  <h1 class="text-primary" style="padding:7%;">Meus Anuncios</h1>  

  @foreach($valor as $anuncio)
    @php
      $linkes = explode(",", $anuncio->fotoTib); //Coleta os linkes das imagens
        
        
        /*if($anuncio->id_tibcategory == 1){
          $categoria = "r";
        }else if($anuncio->id_tibcategory == 2){
          $categoria = "c";
        }else if($anuncio->id_tibcategory == 3){
          $categoria = "m";
        }else if($anuncio->id_tibcategory == 4){
          $categoria = "e";
        }else if($anuncio->id_tibcategory == 5){
          $categoria = "b";
        }else if($anuncio->id_tibcategory == 6){
          $categoria = "g";
        }*/

      $page = $anuncio->id_TibItem;

    @endphp 
    
    <table id='conteudo'>
      <tr>
        <td width='auto'>
          <img class='img-rounded' src='{{ asset("upload-/".$linkes[0]."")}}' id='id' width='100px' height='100px'>
        </td>
        <td width='200px'>
      		<div style='margin-left:15px;'>
            <p>{{$anuncio->nome_prod}}</p>
            <p>R$ {{$anuncio->preco}}</p> 
          </div>                                
        </td>
        <td width='60%' align='right'>
          <p style='padding-left:10px;'>
            <button class="btn btn-default" id="editPage.php?page=id_tib" type="button" 
            onclick="alterar_div('{{$page}}')"><span class="glyphicon glyphicon-trash"><br />Deletar</span></button>
          </p> 
        </td>
      </tr>
    </table><br />

  @endforeach    

<center>  
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="{{ route('MeusAnuncios') }}/{{$ant}}" aria-label="Voltar">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      @for($i = 1; $i <= ceil(count($paginar) / 5); $i++)
  
      <li class="page-item">
        <a class="page-link" href="{{ route('MeusAnuncios') }}/{{$i}}">{{$i}}</a>
      </li>

      @endfor

      <li class="page-item">
        <a class="page-link" href="{{ route('MeusAnuncios') }}/{{$nx}}" aria-label="Proximo">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
</center>

	
@stop

