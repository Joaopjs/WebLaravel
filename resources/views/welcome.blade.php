@extends('layouts.app')

@section('content')
<div class="conteiner">
    <div class="row">
        <div class="col-sm-4">
            <a href="Pages/Celular">
            <img src="images/celular.jpg" width="225" height="225" />
            <p>Diversar Marcas e Modelos<br>
            Click Aqui e Conheça <br>
            As Promoçoes.</p></a>
        </div>
        <div class="col-sm-4">
            <a href="Pages/Moveis">
            <img src="images/mesa.jpg" width="225" height="225" /></br>
            <p>Moveis e Primeira <br>
            Aproite Compre Aqui <br>
            24 horas por dia.</p></a>
        
        </div>
        <div class="col-sm-4">
            <a href="Pages/Games">
            <img src="images/videogame.jpg" width="225" height="225" /></br>
            <p>Os melhores Jogos <br>
            e Video Gmaes <br>
            Aqui.</p></a>            
        </div>
    </div>
</div>
@endsection
