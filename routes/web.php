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

Route::get('/clients', 'ClientController@listClient' );
Route::get('/client/ajouter', 'ClientController@ajouter' );
Route::post('/client/ajouter', 'ClientController@ajouter' );
Route::get('/client/modifier/{id_client}', 'ClientController@modifier' );
Route::post('/client/modifier/{id_client}', 'ClientController@modifier' );
Route::get('/client/supprimer/{id_client}', 'ClientController@supprimer' );


Route::get('/bls', 'BlController@listBL' );
Route::get('/bl/ajouter', 'BlController@ajouter' );
Route::post('/bl/ajouter', 'BlController@ajouter' );
Route::get('/bl/modifier/{id_BL}', 'BlController@modifier' );
Route::post('/bl/modifier/{id_BL}', 'BlController@modifier' );
Route::get('/bl/supprimer/{id_BL}', 'BlController@supprimer' );


Route::get('/dbl/details/{id_BL}', 'DetailBLController@details' );
Route::get('/dbl/imprimer/{id_BL}', 'DetailBLController@imprimer' );

Route::get('/', function () {
    return view('documentation');
});
