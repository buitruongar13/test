<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/", [employeesController::class, "getAllRecords"]);
Route::post('/record/{id}/update', [employeesController::class, 'update'])->name('updateRecord');
Route::post('/add', [employeesController::class, 'add'])->name('addRecord');
Route::delete('/record/{id}/delete', [employeesController::class, 'delete'])->name('deleteRecord');
// Route::get('/', function () {
//     $test = request()->input('b', '');
//     $action = request()->input('a', 'getAllRecords');

//     $myController = new employeesController();

//     if ($test !== '') {
//         return $myController->$action($test);
//     } else {
//         return $myController->$action();
//     }
// });
