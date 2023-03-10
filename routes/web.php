<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SessionController;
use App\Models\Person;
use App\Models\Product;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TimeController;

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

Route::get('/home', [AuthorController::class, 'index']);
Route::get('home', [AuthorController::class, 'index'])->middleware('auth');
Route::get('/auth', [AuthorController::class, 'check']);
Route::post('/auth', [AuthorController::class, 'checkUser']);

Route::get('/find', [AuthorController::class, 'find']);
Route::post('/find', [AuthorController::class, 'search']);
Route::get('/add', [AuthorController::class, 'add']);
Route::post('/add', [AuthorController::class, 'create']);
Route::get('/edit',[AuthorController::class, 'edit']);
Route::post('/edit', [AuthorController::class, 'update']);
Route::get('delete', [AuthorController::class, 'delete']);
Route::post('delete', [AuthorController::class, 'remove']);
Route::get('/author/{author}', [AuthorController::class, 'bind']);
Route::get('middleware', [AuthorController::class, 'get']);
Route::post('middleware', [AuthorController::class, 'post']);
//BookController
Route::prefix('book')->group(function(){
    Route::get('/', [BookController::class, 'index']);
    Route::get('/add', [BookController::class, 'add']);
    Route::post('/add', [BookController::class, 'create']);
});
Route::get('relation', [AuthorController::class, 'relate']);
Route::get('/session', [SessionController::class, 'getSes']);
Route::post('/session', [SessionController::class, 'postSes']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('softdelete', function(){
    $result = Person::find(1)->delete();
    if($result){
        return "???????????????????????????";
    }
});

Route::get('/softdelete/get', function(){
    $person = Person::onlyTrashed()->get();
    return $person;
});

Route::get('/softdelete/store', function(){
    $result = Person::onlyTrashed()->restore();
    return $result;
});

Route::get('/softdelete/absolute', function(){
    $result = Person::onlyTrashed()->forceDelete();
    return $result;
});

Route::get('uuid', function(){
    $products = Product::all();
    foreach($products as $product){
        echo $product.'<br>';
    }
});

//SchoolController
Route::get('fill', [SchoolController::class, 'fillSchool']);
Route::get('create', [SchoolController::class, 'createSchool']);
Route::get('insert', [SchoolController::class, 'insertSchool']);

//TimeController
Route::get('/time', [TimeController::class, 'index']);