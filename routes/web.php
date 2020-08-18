<?php
use \Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;


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



Auth::routes();
Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/','DocsController@welcome');
Route::get('/inventory','DocsController@IM_API')->name('im.api');
Route::get('/home', 'HomeController@index')->name('home');
