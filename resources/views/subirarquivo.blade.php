@extends('layouts.app')


@section('titulo')
	Upload
@stop

@section('content')
	
	<style>
	   input[type=file] {
		display: block !important;
		right: 1px;
		top: 1px;
		height: 34px;
		opacity: 0;
	  width: 100%;
		background: none;
		position: absolute;
	  overflow: hidden;
	}

	.inputfile {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
	.inputfile + #arq {
	    font-size: 1.25em;
	    font-weight: 700;
	    color: white;
		width: 200px;
		height: 200px;
	    background-image:url("{{ asset('images/3_White_logo_on_color1_216x65.png')}}");
		background-size:200px 200px;
		background-position: top center;
		background-repeat: no-repeat;
	    display: inline-block;
	}

	.inputfile:focus + #arq,
	.inputfile + #arq:hover {
		width: 200px;
		height: 200px;
	    background-image:url("{{ asset('images/3_White_logo_on_color1_216x65.png')}}");
		background-size:200px 200px;
		background-position: top center;
		background-repeat: no-repeat;
		
	}
	.inputfile + #arq {
		cursor: pointer; /* "hand" cursor */
	}
	.inputfile:focus + #arq {
		outline: 1px dotted #000;
		outline: -webkit-focus-ring-color auto 5px;
	}

	///////////////////////////////
	.inputfile2 {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
	.inputfile2 + #arq2 {
	    font-size: 1.25em;
	    font-weight: 700;
	    color: white;
		width: 200px;
		height: 200px;
	    background-image:url("{{ asset('images/3_White_logo_on_color1_216x65.png')}}");
		background-size:200px 200px;
		background-position: top center;
		background-repeat: no-repeat;
	    display: inline-block;
	}

	.inputfile2:focus + #arq2,
	.inputfile2 + #arq2:hover {
	    background-image:url("{{ asset('images/3_White_logo_on_color1_216x65.png')}}");
		background-size:200px 200px;
		background-position: top center;
		background-repeat: no-repeat;
		width: 200px;
		height: 200px;
	}
	.inputfile2 + #arq2 {
		cursor: pointer; /* "hand" cursor */
	}
	.inputfile2:focus + #arq2 {
		outline: 1px dotted #000;
		outline: -webkit-focus-ring-color auto 5px;
	}
	//////////////////////////////////////
	.inputfile3 {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
	.inputfile3 + #arq3 {
	    font-size: 1.25em;
	    font-weight: 700;
	    color: white;
		width: 200px;
		height: 200px;
	    background-image:url("{{ asset('images/3_White_logo_on_color1_216x65.png')}}");
		background-size:200px 200px;
		background-position: top center;
		background-repeat: no-repeat;
	    display: inline-block;
	}

	.inputfile3:focus + #arq3,
	.inputfile3 + #arq3:hover {
	    background-image:url("{{ asset('images/3_White_logo_on_color1_216x65.png')}}");
		background-size:200px 200px;
		background-position: top center;
		background-repeat: no-repeat;
		width: 200px;
		height: 200px;
	}
	.inputfile3 + #arq3 {
		cursor: pointer; /* "hand" cursor */
	}
	.inputfile3:focus + #arq3 {
		outline: 1px dotted #000;
		outline: -webkit-focus-ring-color auto 5px;
	}
</style>


	                        <h1 class="text-primary" style="padding:5%;">Subir Anuncio</h1>
	                        <table>
	                           <tr>
	                      
	    
	                
	                                <br /><br />
	                            <form action="#" method="post" id="cadform" enctype="multipart/form-data">
	                            	{{ csrf_field() }}
	                          <label class="text-primary">Extensões jpg, png e jpeg</label>
	                          <div align="center">
	                    <input type="file" name="file1" id="file" class="inputfile" 
	   accept=".jpg, .jpeg, .png"  placeholder="New item" draggable="true"  required="required"/>
		                        <label for="file" id="arq"></label>&nbsp;&nbsp;
	                            
	                   <input type="file" name="file2" id="file2" class="inputfile2" 
	   accept=".jpg, .jpeg, .png" hidden="true" placeholder="New item2" draggable="true" required="required"/>
								<label for="file2" id="arq2"></label>&nbsp;&nbsp;
	                            
	                   <input type="file" name="file3" id="file3" class="inputfile3" 
	   accept=".jpg, .jpeg, .png" hidden="true" placeholder="New item3" draggable="true" required="required"/>
								<label for="file3" id="arq3"></label>
	                            <button class="apagar" style="width:60p; height:200px; vertical-align:top;"> apagar</button>
	                          </div>
	                          <br /><br />
	                          <br /><br />
	                                        
	  
	  <div style=" padding-left:20px">Produto:</div> 
	  <input type="text" class="form-control" required="required" name="produto" maxlength="12"/><br /><br />
	  <div style=" padding-left:20px">Descrição:</div> 
	  <textarea name="descricao" class="form-control" cols='47' rows='14' id='mensagem' maxlength='600' style='resize:none; width:50%;'></textarea><br /><br />
	  <div style=" padding-left:20px">Categoria:</div>
	  											
	            
        <select class='form-control' name='menu' size=1 required='required'>           	
          
        @foreach($cat as $ct)                      
          <option value="{{$ct->id_tibcategory}}">{{$ct->catnome}}</option>
        @endforeach         
             </select>
	                                        
	                                                        
	                                                        
	  											<br /><br />
	  <div style=" padding-left:20px">Preço:</div> 
	  <input type="number" class="form-control" required="required" name="preco"/><br /><br />
	  <div style=" padding-left:20px">telefone:</div> 
	  	<input type="number" class="form-control" required="required" name="telefone"/><br /><br />


<div class="progress progress-striped active">
  <div class="progress-bar" style="width: 0%;">25%</div>
</div>

<script>
	$(document).on('submit', 'form', function(e){
		e.preventDefault();
		//receber dados
		$form = $(this);

		var formulario = new FormData($form[0]);

		//criar a conecxao comoservidor
		var request = new XMMHttpRequest();

		//progresso do Upload
		request.upload.addEventListener('progress', function(e){
				var percent = Math.round(s.loaded / e.total * 100);
				$form.find('.progress-bar').width(percent + %).html(percent+ '%');

		});
		//Upload Completo
		request.addEventListener('load', function(e){
			$form.find('.progress-bar').addClass('.progress-bar-success').html('Upload Completo');
			//Atualizar a pagina apos completar
			setTimeout("window.open(self.location, '_self');",1000);
		});

		//Aruivo Responsavel pela imagem

		request.open('post', "{{ route('uploadd')}}");
		request.send(formulario);

	});

</script>


	           <button class="btn btn-primary" id="cadfor" >Salvar</button>
	  
	  
	  </form>

	  
        </tr>
   </table>                              

	                             
	
@stop

@section('actionname')
	<script>
		$(document).ready(function(e) {
			
			
			
		var url = "upload.php";	
		var met = $("#cadform").attr("method");
		var res = false;
		
		/*$("#cadform").ajaxForm({
			seccess: function(retorno){
				
				document.write("<p>jkjj</p>");
			}
			
			
			
		});
			
		/*$("#cadform").ajaxForm({
			seccess: function(retorno){
				
				$("#cadform").val("");
			}
			
			
			
		});*/
		
			
			//primeira Imagem							
			$(".inputfile").on('change', function () {									
		   
			 if (typeof (FileReader) != "undefined")
			  {
				  
				  var reader = new FileReader();
					
					reader.onload = function (e) 
					{											
											
				  
						$(".inputfile + #arq").css("background-image", "url("+e.target.result+")");
													
					}
					
					   reader.readAsDataURL($(this)[0].files[0]);
					   
			  } else{
				  alert("Este navegador nao suporta FileReader.");
			  }	

					  });
					  
					  
					  //segunda Imagem
					  $(".inputfile2").on('change', function () {									
		   
			 if (typeof (FileReader) != "undefined")
			  {
				  
				  var reader = new FileReader();
					
					reader.onload = function (e) 
					{											
											
				  
						$(".inputfile2 + #arq2").css("background-image", "url("+e.target.result+")");
													
					}
					
					   reader.readAsDataURL($(this)[0].files[0]);
					   
			  } else{
				  alert("Este navegador nao suporta FileReader.");
			  }	

					  });
					  
					  //terceira Imagem 
					  $(".inputfile3").on('change', function () {									
		   
			 if (typeof (FileReader) != "undefined")
			  {
				  
				  var reader = new FileReader();
					
					reader.onload = function (e) 
					{											
											
				  
						$(".inputfile3 + #arq3").css("background-image", "url("+e.target.result+")");
													
					}
					
					   reader.readAsDataURL($(this)[0].files[0]);
					   
			  } else{
				  alert("Este navegador nao suporta FileReader.");
			  }	

					  });
					  
					  $(".apagar").on("click", function(){
						  
						$(".inputfile + #arq").css("background-image", "url({{ asset('images/3_White_logo_on_color1_216x65.png')}})");
						$(".inputfile2 + #arq2").css("background-image", "url({{ asset('images/3_White_logo_on_color1_216x65.png')}})");
						$(".inputfile3 + #arq3").css("background-image", "url({{ asset('images/3_White_logo_on_color1_216x65.png')}})");	
						$("#file").val("");	
						$("#file2").val("");
						$("#file3").val("");
						$("input:text:eq(1):visible").focus();		
						return (false);
					});	

			});
								</script>

@stop	  