@extends('layouts.app')


@section('titulo')
	Detalhes
@stop

@section('content')
@foreach($item as $it)
	@php
		$linkes = explode(",", $it->fotoTib); //Coleta os linkes das imagens
		$nome = $it->nome_prod;
		$descri = $it->descri;
		$preco = $it->preco;
		$telefone = $it->telefoneTib;
		$idveneor = $it->id_Tib;
		$vend = $it->name;
		$cidad = $it->cidade;
		$bairr = $it->bairro;
		
	@endphp
		
	<div class='container-fluid'>
	    	<div class='row'>
	        	<div class='col-sm-12'>
	                                        				
				   <h2>Preço</h2>
                   <p>R$ {{$preco}}</p>
      
    	                            <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'                                                    aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='exampleModalLabel'>Tiby</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											<div style='width:100%; height:100%'><img id='foto' src='{{ asset("upload-/".$linkes[0]."")}}' width='100%' heigth='100%'/></div>
										  </div>
										  <div class='modal-footer'>
										  		<button type='button' class='btn btn-primary' data-dismiss='modal'>Fechar</button>
										  </div>
										</div>
									  </div>
									</div>
							
							  
								<div class='modal fade' id='exampleModal1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'      aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='exampleModalLabel'>Tiby</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											<div style='width:100%; height:100%'><img src='{{ asset("upload-/".$linkes[1]."")}}' width='100%' heigth='100%'/></div>
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Fechar</button>
										  </div>
										</div>
									  </div>
									</div>
									
									<div class='modal fade' id='exampleModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'      aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='exampleModalLabel'>Tiby</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body' >
											<div style='width:100%; height:100%'><img src='{{ asset("upload-/".$linkes[2]."")}}' width='100%' heigth='100%'/></div>
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Fechar</button>
										  </div>
										</div>
									  </div>
									</div> 
						<div class='conteiner'>		
                           <div class='col-sm-6'>
							  <div id='meuSlider' class='carousel slide' data-ride='carousel'>
								<ol class='carousel-indicators'>
									<li data-target='#meuSlider' data-slide-to='0' class='active'></li>
									<li data-target='#meuSlide' data-slide-to='1'></li>
									<li data-target='#meuSlider' data-slide-to='2'></li>
								</ol>
							   <div class='carousel-inner'>
									<div class='item active'><img src='{{ asset("upload-/".$linkes[0]."")}}' alt='Slider 1' data-toggle='modal' data-target='#exampleModal'/></div>
									<div class='item'><img src='{{ asset("upload-/".$linkes[1]."")}}' data-toggle='modal' data-target='#exampleModal1'/></div>
									<div class='item'><img src='{{ asset("upload-/".$linkes[2]."")}}' data-toggle='modal' data-target='#exampleModal2' /></div>
							   </div>
								<a class='left carousel-control' href='#meuSlider' data-slide='prev'><span class='glyphicon glyphicon-chevron-left'>                                    </span></a>
								<a class='right carousel-control' href='#meuSlider' data-slide='next'><span class='glyphicon glyphicon-chevron-right'>                                    </span></a>
							 </div>
							 
							 <h2>Descrição:</h2>
           <p><textarea name='descricao' cols='47' rows='14' id='mensagem' maxlength='600' value='$descri' readonly 
		       style='resize:none; border:none; width:90%; height: auto;'>{{$descri}}</textarea></p>
		  
						  
						  <br />
                              
                              <h2>Localização:</h2>
                              <p>{{$cidad}}&nbsp;&nbsp;&nbsp; {{$bairr}}</p> 
                              <br />
                              <p><strong>Observação:</strong><br /><br />  O Tib é uma site de relacinamento <br />
                                                                   entre comprador e vendedor, Quanto mais anuncios.<br />
                                                                   Mais vendas.<br />
                                                                     </p> 
							 
						</div>	

						<div class='col-sm-6'>
							 <h2>Informações de contato&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                              <p>Nome {{$vend}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Telefone {{$telefone}}</p>
							  <div align='center' style='padding:1%;'>
								  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal8'>
									  Mensagem
								  </button>
							  </div>
							 <div class='modal fade' id='exampleModal8' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'                                                    aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title text-primary' id='exampleModalLabel'>Tiby</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>														 
											 <center> 
												<div class='panel panel-default'>
													<iframe id='chat' src="{{ route('formulario')}}/{{$pg}}/{{$linkes[0]}}" width='100%' 
													  width='100%' height='400px' name='chat' scrolling='no' style='padding:inherit' frameborder='0'>
													</iframe>
												</div>	
											</center>
										  
										  </div>
										  <div class='modal-footer'>
										  		<button type='button' class='btn btn-primary' data-dismiss='modal'>Fechar</button>
										  </div>
										</div>
									  </div>
									</div>

						</div>
					</div>	  
	                            
								         
	        </div>
	            
	    </div>
	</div>
@endforeach
@stop