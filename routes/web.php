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
    return view('welcome',['name123' => 'Taylor']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('homeforms', 'HomeformsController@index');
Route::get('homeforms/getdata', 'HomeformsController@homeforms')->name('homeforms/homeforms');
//Route::get('/homeforms', 'HomeformsController@homeforms');
/*Route::controller('HomeformsController', 'HomeformsController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);*/
Route::get('datatable', 'DataTableController@datatable');
Route::post('/update', 'DataTableController@updateuser');
//Route::get('datatable/update', 'DataTableController@updateuser');
// Get Data
Route::get('datatable/getdata', 'DataTableController@getPosts')->name('datatable/getdata');
Route::get('/downloadPDF/{id}','DataTableController@downloadPDF');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

