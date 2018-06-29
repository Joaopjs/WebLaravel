
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', 'PrincipalController@index')->name('inicio');
Route::get('/Home', 'PrincipalController@index')->name('Homes');
Route::get('/localizar', 'PrincipalController@localizar')->name('localizar');
Route::get('/Celular/{id?}', 'PrincipalController@celular')->name('Celular');
Route::get('/Computador/{id?}', 'PrincipalController@computador')->name('Computador');
Route::get('/Moveis/{id?}', 'PrincipalController@moveis')->name('Moveis');
Route::get('/Eletrodomesticos/{id?}', 'PrincipalController@eletrodomesticos')->name('Eletrodomesticos');
Route::get('/Brinquedos/{id?}', 'PrincipalController@brinquedos')->name('Brinquedos');
Route::get('/Games/{id?}', 'PrincipalController@games')->name('Games');
Route::get('/teste', 'PrincipalController@teste')->name('teste');
Route::get('Detalhes/{id?}', 'PrincipalController@comprar')->name('comprar');
Route::get('SubirArquivos', 'PrincipalController@subirarquivo')->name('subirarquivo');
Route::post('SubirArquivos', 'PrincipalController@subirarquivo')->name('subirarquivo');
Route::post('uploadd', 'PrincipalController@uploadd')->name('uploadd');
Route::get('MeusAnuncios/{page?}', 'PrincipalController@meusAnuncios')->name('MeusAnuncios');
Route::get('Pesquisar/{page?}',   'PrincipalController@pesquisar')->name('pesquisar');

//Responsavel po mensagensss
Route::get('formulario/{page?}/{foto?}', 'MensagemController@formulario')->name('formulario');
Route::get('exibirform/{page?}', 'MensagemController@exibirform')->name('exibirform');
Route::get('chatForm/{page?}/{res?}/{des?}', 'MensagemController@chatForm')->name('chatForm');
Route::get('Chat/{page?}/{acione?}', 'MensagemController@mensagem')->name('mensagem');
Route::get('Contato', 'MensagemController@contato')->name('Contato');
Route::post('sendMensagem', 'MensagemController@sendMensagem')->name('sendMensagem');
Route::get('mensagemTib/{page?}/{ress?}/{dest?}', 'MensagemController@mensagemTib')->name('mensagemTib');
Route::get('excluirmessage/{page?}', 'MensagemController@excluirmessage')->name('excluirmessage');
Route::post('chatinsert/{page?}/{ress?}/{dest?}', 'MensagemController@chatinsert')->name('chatinsert');
Route::get('exibir/{page?}/{ress?}/{dest?}', 'MensagemController@exibir')->name('exibir');
////


//Manutençao
Route::get('deletar/{page?}', 'MaintenanceController@deletar')->name('deletar');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

////////////////
Route::get('/resizeimage', 'ImageController@resizeImage');
Route::post('/resizeimagepost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);
