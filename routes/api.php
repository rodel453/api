<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Analytics;
use Spatie\Analytics\Period;

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

Route::get('/test', function(){
    return 'test';
});

route::get('/analyticsview',function(){

    $data = Analytics::fetchMostVisitedPages(Period::days(700));
    return $data;
});

route::get('/viewpage', [App\Http\Controllers\AnalyticsController::class, 'visitorpageview'] )->name('visitors');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
