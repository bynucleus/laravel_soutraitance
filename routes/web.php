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

Route::get('/', function(){
    return redirect('admin');
});


// route login et register
// Route::get('/register', 'RegisterController@index')->name('register.index');
// Route::post('/traitement-register', 'RegisterController@traitement')->name('register.traitement');
// Route::get('/login', 'LoginController@index')->name('login.index');
// Route::post('/traitement-login', 'LoginController@traitement')->name('login.traitement');




/* pour la page vuejs */
Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array)config('backpack.base.web_middleware', 'web'),
        (array)config('backpack.base.middleware_key', 'admin')
    )
], function () { // custom admin routes
    /* pour vuejs */
    Route::view('/v/{vue_capture?}', 'vue.index')->where('vue_capture', '[\/\w\.-]*');
});

