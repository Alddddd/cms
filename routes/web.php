<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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
    return 'Hi You!';
});

Route::get('/about', function () {
    return 'This is about page';
});

// Route::get('/contact', function () {
//     return 'This is contact page';
// });


Route::get('/admin/post/example', array('as'=>'admin.home', function () {

 $url = route('admin.home');

    return 'This url is ' .$url;
}));

Route::get('/contact', [PostsController::class, 'contact']);

Route::get('/post/{id}/{name}/{password}', [PostsController::class, 'show_post']);