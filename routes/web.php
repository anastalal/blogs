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
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    }); 
    
    // Route::get('/', [\App\Http\Controllers\BlogPostController::class, 'index']);  
    Route::get('/', [\App\Http\Controllers\ReportsController::class, 'index']);  
    Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']); 
    Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create post form
    Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); //saves the created post to the databse
    Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit post form
    Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); //commits edited post to the database 
    Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']);  //deletes post from the database 
    // Route::get('/reports/create', [\App\Http\Controllers\ReportsController::class, 'create']);
    // Route::post('report', [\App\Http\Controllers\ReportsController::class, 'store']); 
    
    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */  
        
        Route::get('reports/show/{Reports}', [\App\Http\Controllers\ReportsController::class, 'show']); 
        Route::get('/reports/create', [\App\Http\Controllers\ReportsController::class, 'create'])->name('reports.create');
        Route::post('reports', [\App\Http\Controllers\ReportsController::class, 'store']); 
        Route::get('officers/show/{officers}', [\App\Http\Controllers\OfficersController::class, 'show']); 
        Route::get('/officers/create', [\App\Http\Controllers\OfficersController::class, 'create']);
        Route::post('officers', [\App\Http\Controllers\OfficersController::class, 'store']);  
        Route::get('/reports/{reports}/edit', [\App\Http\Controllers\ReportsController::class, 'edit']); //shows edit post form
        Route::get('/reports/archive/{id}', [\App\Http\Controllers\ReportsController::class, 'archive']);
      // Route::post('reports/show/{id}', [\App\Http\Controllers\ReportsController::class, 'show']);  
       
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    });
});
