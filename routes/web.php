<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // import post controller


Route::get('/', [PostController::class, 'index']);
// route for create post
Route::get('create/post', [PostController::class, 'create']);
// route for store post
Route::post('store/post', [PostController::class, 'store']);
// route for edit post
Route::get('edit/post/{id}', [PostController::class, 'edit']);
// route for update post
Route::post('store/post/{id}', [PostController::class, 'update']);
// route for delete post
Route::post('delete/post/{id}', [PostController::class, 'delete']);
