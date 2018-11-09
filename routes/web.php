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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::resource('pessoas', 'PessoasController');
Route::resource('profissoes', 'ProfissaoController');
Route::resource('cidades', 'CidadeController');
Route::resource('musicas', 'MusicaController');
Route::get('/musicas/registros/{id}', 'MusicaController@pessoasMusicas_index')->name('musicaRegistro');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profissao_pessoas', 'ProfissaoPessoasController@index')->name('profissaopessoas.index');

Route::get('decompose','\Lubusin\Decomposer\Controllers\DecomposerController@index');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/historico', 'historicoController@index')->name('historico');
Route::get('/historico/{id}', 'historicoController@vizualizar')->name('vizualizar');

Route::get('/pdf/{id}', 'PDFController@pdf_hist')->name('pdf_hist');

Route::get('/excel', 'ExcelController@export')->name('excel');

//rota ajax
Route::get('/pessoas/estado/{id}', 'PessoasController@cidadesDoEstado');

Route::get('/profissao_pessoas/{id}', 'ProfissaoPessoasController@selectNomes');
Route::get('/profissao_pessoas/profissaodapessoa/{id}', 'ProfissaoPessoasController@selectProfissao');

//soft deleting
Route::get('/deletadas', 'PessoasController@deletadas')->name('pessoas.deletadas');
Route::delete('/deletadas/destroyforever/{id}', 'PessoasController@destroyForever')->name('pessoas.destroyforever');
Route::get('/deletadas/restore/{id}', 'PessoasController@restore')->name('pessoas.restore');
