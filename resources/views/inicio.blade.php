@extends('layouts.app')

@section('titulo')
	Home
@stop

@section('content')
	
    <div class="conteiner">
                <div class="row">
                    <div class="col-sm-4" id="bl1">
                        <a href="{{ route('Celular') }}">
                        <img src="images/celular.jpg" width="100%" height="225" />
                        <p>Diversar Marcas e Modelos<br>
                        Click Aqui e Conheça <br>
                        As Promoçoes.</p></a>
                    </div>
                    <div class="col-sm-4" id="bl2">
                        <a href="{{ route('Moveis') }}">
                        <img src="images/mesa.jpg" width="100%" height="225" /></br>
                        <p>Moveis e Primeira <br>
                        Aproite Compre Aqui <br>
                        24 horas por dia.</p></a>
                    
                    </div>
                    <div class="col-sm-4" id="bl3">
                        <a href="{{ route('Games') }}">
                        <img src="images/videogame.jpg" width="100%" height="225" /></br>
                        <p>Os melhores Jogos <br>
                        e Video Gmaes <br>
                        Aqui.</p></a>            
                    </div>
                </div>
            </div>

@stop