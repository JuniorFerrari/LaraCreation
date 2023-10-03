<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/',function (){
    return 'че он ооет то';
});

Route::get('/posts', [\App\Http\Controllers\PostController::class,'index'])->name('post.index');
Route::get('/posts/create',[\App\Http\Controllers\PostController::class,'create'])->name('post.create');

Route::post('/posts',[\App\Http\Controllers\PostController::class,'store'])->name('post.store');
Route::get('/posts/{post}',[\App\Http\Controllers\PostController::class,'show'])->name('post.show');
Route::get('/posts/{post}/edit',[\App\Http\Controllers\PostController::class,'edit'])->name('post.edit');
Route::patch('/posts/{post}',[\App\Http\Controllers\PostController::class,'update'])->name('post.update');
Route::delete('/posts/{post}',[\App\Http\Controllers\PostController::class,'destroy'])->name('post.delete');
Route::get('posts/{post}/restore',[\App\Http\Controllers\PostController::class,'restore'])->name('post.restore');


Route::get('/posts/update',[\App\Http\Controllers\PostController::class,'update']);
Route::get('/posts/delete',[\App\Http\Controllers\PostController::class,'delete']);
Route::get('/posts/first_or_create',[\App\Http\Controllers\PostController::class,'firstOrCreate']);
Route::get('/posts/update_or_create',[\App\Http\Controllers\PostController::class,'updateOrCreate']);

Route::get('/main',[\App\Http\Controllers\MainController::class,'index'])->name('main.index');
Route::get('/contact',[\App\Http\Controllers\ContactController::class,'index'])->name('contact.index');
Route::get('/about',[\App\Http\Controllers\AboutController::class,'index'])->name('about.index');

Route::get('/categories/{category}',[\App\Http\Controllers\PostController::class,'category'])->name('categories');

