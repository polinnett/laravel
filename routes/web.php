<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;



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

//comment

Route::prefix('/comment')->group(function(){
    Route::get('/all', [CommentController::class, 'index']);
    Route::post('', [CommentController::class, 'store']);
    Route::get('/edit/{id}', [CommentController::class, 'edit']);
    Route::post('/update/{id}', [CommentController::class, 'update']);
    Route::get('/delete/{id}', [CommentController::class, 'delete']);
    Route::get('/accept/{id}', [CommentController::class, 'accept']);
    Route::get('/reject/{id}', [CommentController::class, 'reject']);
});

Route::get('/', [MainController::class, 'index']);
Route::get('/galery/{img}', [MainController::class, 'galery']);

// auth
Route::post('/registr', [AuthController::class, 'registr']);
Route::get('/create', [AuthController::class, 'create']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [MainController::class, 'index']);
Route::get('/galery/{img}', [MainController::class, 'galery']);

// article
//посредник, который проверяет авторизацию по наличию токенов в сессии
Route::resource('article', ArticleController::class)->middleware('auth:sanctum');
Route::get('article/{article}', [ArticleController::class, 'show'])->middleware('path', 'auth:sanctum')->name('article.show');


// Route::get('/contacts', function () {
//     return view('main/contacts');
// });

Route::get('/contacts', function(){
    $data = [
        'name'=>'Moscow Polytech',
        'address' => 'Bol. Semenovskaya',
        'phone'=>'8(495)223-2323',
        'email'=>'main@mospolytech.ru'
    ];
    return view('main.contacts', ['data'=>$data]);
});
