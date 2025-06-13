<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;





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
   return view ('welcome');
});
//
////Route::get('/admin/{id}/{name}', function ($id,$name) {
////   return "This is the admin ID" . " " . $id . " and Name: " . " " . $name;
////});
//
//Route::get('/user/post/example', function () {
//
//    $url = route('user.post');
//
//    return "This is the url: " . $url;
//})->name('user.post');
//
//Route::get('/admin/post/example',array ( 'as' => 'admin.post', function () {
//
//    $url = route('admin.post');
//
//    return "This is the url: " . $url;
//
//}));

//Route::resource('/post',CreateController::class);

//Route::get('/post/{id}', [CreateController::class, 'index']);

//Route::get('/call', [CreateController::class, 'call']);

Route::get('/app/{name}/{password}', [CreateController::class,'make_me']);

Route::get('/call/{name}/{password}', [CreateController::class,'make_me1']);

Route::get('/make/{name}/{password}', [CreateController::class,'make_me2']);

Route::get('/app', [CreateController::class,'people_list']);


Route::get('insert', function(){

    DB::insert('insert into post(title, body) values (?,?)', ["Laravel Title: ", "Laravel is awesome!"] );

});

Route::get('/read', function(){

   $results = DB::select('select * from post where id = ?', [1]);

   foreach($results as $post){

       return $post->title;

   }

});

//Route::get('/update', function(){
//
//   DB::update('update post set title = "Updated Title(1)" where id = ? ', [1]);
//
//
//});

Route::get('/delete', function(){


   $deleted = DB::delete('delete from post where id = ?', [3]);

    if ($deleted == 2){

        return "Your post has been deleted";

    } else {

        return "Your post has not been deleted";

    }
});

Route::get('find', function(){

   $posts = Post::find(4);

   return $posts->body;

});

Route::get('/find_where_1', function () {

    $posts = Post::where('id', 4)->orderBy('id', 'asc')->take(2)->get();

    return $posts;
});

Route::get('/find_where_2', function () {

    $posts = Post::where('id', 4)->orderBy('id', 'desc')->take(1)->get();

    return $posts;
});

Route::get('/find_where_2', function () {

    $posts = Post::where('id', '>','5')->firstOrFail();

    return $posts;
});

Route::get('/basicinsert', function(){

    $post = new Post;

    $post->title = "Insert new title";
    $post->body = "Insert new content";
    $post->save();

});

//Route::get('/basicinsert', function(){
//
//    $post = Post::find(4);
//
//    $post->title = "Insert new title 1";
//    $post->body = "Insert new content 1";
//    $post->save();
//
//});

Route::get('/create', function(){

   Post::create(['user_id' => 2, 'title'=> 'Created Title11', 'body' => 'Created body11']);

});

Route::get('/update', function(){

    Post::where('id',4)->update(['title' => 'Updated Title1', 'body' => 'Updated body']);

});

//Route::get('/delete', function(){
//
//
//    $post = Post::find(4);
//
//    $post->delete();
//
//
//});


Route::get('/delete', function(){


    Post::where('id',1)->delete();


});

Route::get('insert3', function (){

    Post::create(['title' => 'Insert Title1', 'body' => 'Insert body1']);


});

Route::get('/softdelete', function(){

    Post::find(1)->delete();


});

Route::get('insert11', function(){


    $post = new Post;

    $post->title = 'Insert Title111';
    $post->body = 'Insert body111';

    $post->save();


});

Route::get('/readsoftdelete', function(){


//    $post = Post::withTrashed()->where('id', 6)->get();
//
//    return $post;

    $post = Post::onlyTrashed()->get();

    return $post;

});

Route::get('/restore', function(){


    Post::onlyTrashed()->restore();


});

Route::get('/forcedelete', function(){

    Post::withTrashed()->forceDelete();


});

Route::get('/User/{id}/post', function($id){

   return User::find($id)->post;


});

Route::get('post/{id}/user', function($id){

    return Post::find($id)->user->name;

});

Route::get('posts',function(){

    $users = User::find(1);

    foreach($users->posts as $post){

        echo $post->title . "<br>" . "<br>" ;

    }



});

Route::get('user/{id}/role', function($id){

     $user = User::find($id);

    foreach($user->role as $role){

        return $role->name;

    }
});

Route::get('user/pivot', function(){

    $users = User::find(1);

    foreach($users->role as $role){

        return $role->pivot->created_at;

    }


});

Route::get('/user/country', function(){

    $countries = Country::find(1);

    foreach($countries->post as $post){

        return $post->title;

    }


});


Route::resource('posts', PostsController::class);



