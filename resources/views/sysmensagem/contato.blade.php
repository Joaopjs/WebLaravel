@extends('welcome')


@section('titulo')
	Celulares
@stop

@section('conteudo')

	<div id="conteudo">
                    </div>
					
                    <div style="padding-left:10%;">
                       <h1 class="text-primary" style="margin-left::3%;margin-top:3%; margin-bottom:0;">Contato</h1><br /><br />
                       
                       <div style="margin-bottom:2%;">
                       <font color="#222;"><strong>Sistema de vendas Tiby<br />
                       Sorocaba<br />
                       Centro<br />
                       Brasil</strong>
                       </font>
                       </div>
                    </div>
                                                
                                <form id="formulario" method="post">
                                {{ csrf_field() }}
                                	
                                    <p>Nome:</p>
                                    <input type="text" class="form-control" name="nome" style="width:100%;" id="nome" required="required"/>
                                
                                    e-mail:
                                    <input type="email" class="form-control" name="email" style="width:100%;" id="email" required="required"/>
                                
                                    Mensagem:
                                    <textarea id="mensagem" class="form-control" name="mensagem" cols="70" rows="8" style="resize:none;" required="required"></textarea><br />
                                   <div align="right" style="padding:1%;">
                                       <input type="submit" class="btn btn-default" onclick="EnviarMessge();" value="Enviar" />
                                   </div>
                                                                                                    
                                
                                </form>

@stop

@section('actionname')
	<style type="text/css">
     .principal {
	   font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
     }
  </style>
  
  <script type="text/javascript">
  
	function EnviarMessge(){
			    
        var nome = $('#nome').val();
		var email = $('#email').val();
		var mensagem = $('#mensagem').val();
	    
        $.ajax({
            url: "mensagem.php",
            method: "POST",
            dataType: "html",
            data: {nome: nome, email: email, mensagem: mensagem}
        }).done(function(data){
             //faz algo quando enviar certo
			 alert("Salvo");
			 $('#conteudo').html(data);
        }).fail(function(data){
            //faz algo quando der errado
			alert("Erro");
        }); 
   }
 
	
  
  </script>
@stop 