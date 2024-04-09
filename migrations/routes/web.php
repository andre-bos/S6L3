<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/users', function () {
    $users = User::get();
    return view('users', ['users' => $users]);
}); */

/* Route::get('/users/posts', function () {
    return User::with('posts')->paginate(5);
}); */

/* Route::get('/posts/{postsnum}/paginate', function (int $postsnum) {
    return Post::paginate($postsnum);
}); */

/* Route::get('/posts', function () {
    return Post::get();
}); */

/* Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'create']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']); */

Route::resource('/posts', PostController::class);
Route::post('/posts/update', [PostController::class, 'updatePost']);
Route::get('/posts/{id}/destroy', [PostController::class, 'destroyPost']);