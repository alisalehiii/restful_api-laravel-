<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});




Route::get('/posts',function(){

    return Post::all();
});



Route::post('/posts',function(){

    request()->validate([
     'title' => 'required',
     'content' => 'required'
    ]);
    
    
     Post::create([
       'title'=>request('title'),
       'content'=>request('content')
   ]);
});


Route::put('posts/{post}',function(Post $post){

    request()->validate([
        'title' => 'required',
        'content' => 'required'
       ]);
       
   $success = $post->update([
       'title' => request('title'),
       'content' => request ('content') 

   ]);


   return [

     'success' => $success
   ];

});




Route::delete('/posts/{post}',function(Post $post){
   $success = $post->delete();

   return[

    'success' => $success
   ];
});

