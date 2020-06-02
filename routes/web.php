<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

$prefixAdmin = config('zvn.url.prefix_admin');
Route::group(['prefix' => $prefixAdmin],function(){
	Route::get('user', function () {
	    return 'user';
	});
	$prefix = 'slider';
	Route::group(['prefix' => $prefix],function() use ($prefix){
		$controller = ucfirst($prefix) . 'Controller@';
		Route::get('', $controller . 'index');
		Route::get('edit/{id}', $controller . 'edit');
		Route::get('delete/{id}', $controller . 'delete');
	});
})
?>