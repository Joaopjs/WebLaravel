<div class="container">
    <div class="row" style="margin-bottom:10px;">
      <div class="col-sm-12">
          <div align="center">
            
        <script>$('inicio').hide();</script>
                <div class='container'>
                    <div class='row' id='conteudo'>
                    @if(Request::is('register') == 1)
                       @php
                        $tamanho = 2;
                        $required = 'required';
                       @endphp
                    @endif                                       
                        
                      <div class="col-sm-{{$tamanho or 3}}">
                                                    
           
                         <form class='form-inline' action='' id='formulario'>
                                                              
                      <select class='form-control' id='estado' name='estado' onChange='SelecionarEstado();' {{$required or ''}} autofocus size=1>
                                            
                                <option value="{{$var[0]}}">@if(request()->cookie('estado') == null)
                                                                 {{$var[1]}}
                                                              @else
                                                                  
                                                                    {{$var[1]}}
                                                                 
                                                              @endif
                                                        </option>

                                @foreach($estados as $est)
                                <option value="{{$est->id_estadot}},{{$est->estado_t}}">{{$est->estado_t}}</option>
                              
                               @endforeach
                                
                               
                                
                                                                
                            </select>
                                        
                          </div>
                         
                         <div class='col-sm-{{$tamanho or 3}}'>
                         <select class='form-control' id='regiao' onChange='SelecionarRegiao();'   
                         {{$required or ''}} name='regiao' size=1>
                         <option  value="{{$var[0]}}">@if(empty(request()->cookie('regiao')))
                                                                 Sua Regiao
                                                              @else
                                                                  
                                                                    {{$var1[1]}}
                                                                 
                                                              @endif</option>
                                              
                              @foreach($nome as $reg)
                                <option value="{{$reg->id_regions}},{{$reg->nomeregiao}}">{{$reg->nomeregiao}}</option>
                            
                              @endforeach                     
                                            
                          </select>
                          </div>
                         
                         <div class='col-sm-{{$tamanho or 3}}'>
                         
                         <select class='form-control' id='cidade' onChange='SelecionarCidade();' 
                         {{$required or ''}} name='cidade' size=1>
                         <option value="">@if(request()->cookie('cidade') == null)
                                                                 Sua Cidade
                                                              @else
                                                                  
                                                                    {{$var2[1]}}
                                                                 
                                                              @endif</option>                     
                                              
                              @foreach($cidades as $cit)
                                <option value="{{$cit->id_cidade_t}},{{$cit->cidade_t}}">{{$cit->cidade_t}}</option>
                        
                              @endforeach                    
                          
                                                
                         </select>
                        </div>
                 
                      </form>
                      <div class='col-sm-3'>
                      </div>
                    </div>
                </div>        
             </div>    
        </div>
    </div>
</div> 