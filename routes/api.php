<?php

use App\Http\Controllers\BillsController;
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
// Route::get('/test', function(Request $request){
//     return 'Autehnticated';
// });
Route::middleware('auth:api')->prefix('v1')->group( function (){
    Route::get('/user',function(Request $request){
        return $request->user;
    });

    // Route::get('/bills/{bill}', [BillsController::class, 'show']);

    // Route::get('/bills', [BillsController::class, 'index']);

    Route::apiResource('/bills',BillsController::class);
});
