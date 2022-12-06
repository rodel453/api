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

// public routes 

Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){

route::get('/viewpage', [App\Http\Controllers\AnalyticsController::class, 'visitorpageview'] )->name('visitors');
route::get('/fetchTopReferrers', [App\Http\Controllers\AnalyticsController::class, 'fetchTopReferrers'] )->name('fetchTopReferrers');
route::get('/fetchUserTypes', [App\Http\Controllers\AnalyticsController::class, 'fetchUserTypes'] )->name('fetchUserTypes');
route::get('/fetchTopBrowsers', [App\Http\Controllers\AnalyticsController::class, 'fetchTopBrowsers'] )->name('fetchTopBrowsers');
route::get('/mobiletraffic', [App\Http\Controllers\AnalyticsController::class, 'mobiletraffic'] )->name('mobiletraffic');
route::get('/performQuery', [App\Http\Controllers\AnalyticsController::class, 'performQuery'] )->name('performQuery');
route::get('/RevGenCampaign', [App\Http\Controllers\AnalyticsController::class, 'RevGenCampaign'] )->name('RevGenCampaign');
route::get('/usersDate', [App\Http\Controllers\AnalyticsController::class, 'usersDate'] )->name('usersDate');
route::get('/usersDate', [App\Http\Controllers\AnalyticsController::class, 'usersDate'] )->name('usersDate');
route::get('/newUsersDate', [App\Http\Controllers\AnalyticsController::class, 'newUsersDate'] )->name('newUsersDate');
route::get('/country', [App\Http\Controllers\AnalyticsController::class, 'country'] )->name('country');
route::get('/BrowOpSystem', [App\Http\Controllers\AnalyticsController::class, 'BrowOpSystem'] )->name('BrowOpSystem');
route::get('/TimeOnSite', [App\Http\Controllers\AnalyticsController::class, 'TimeOnSite'] )->name('TimeOnSite');
route::get('/PageLoadTime', [App\Http\Controllers\AnalyticsController::class, 'PageLoadTime'] )->name('PageLoadTime');
route::get('/UsersDeviceCategory', [App\Http\Controllers\AnalyticsController::class, 'UsersDeviceCategory'] )->name('UsersDeviceCategory');
route::get('/UsersCountry', [App\Http\Controllers\AnalyticsController::class, 'UsersCountry'] )->name('UsersCountry');
route::get('/UsersCity', [App\Http\Controllers\AnalyticsController::class, 'UsersCity'] )->name('UsersCity');
route::get('/UsersLanguage', [App\Http\Controllers\AnalyticsController::class, 'UsersLanguage'] )->name('UsersLanguage');
route::get('/UsersPlatform', [App\Http\Controllers\AnalyticsController::class, 'UsersPlatform'] )->name('UsersPlatform');
route::get('/UsersScreenResolution', [App\Http\Controllers\AnalyticsController::class, 'UsersScreenResolution'] )->name('UsersScreenResolution');
route::get('/UsersBrowser', [App\Http\Controllers\AnalyticsController::class, 'UsersBrowser'] )->name('UsersBrowser');
route::get('/UsersOperatingSystem', [App\Http\Controllers\AnalyticsController::class, 'UsersOperatingSystem'] )->name('UsersOperatingSystem');
route::get('/service', [App\Http\Controllers\AnalyticsController::class, 'service'] )->name('service');
route::get('/event', [App\Http\Controllers\AnalyticsController::class, 'event'] )->name('event');
route::get('/UserTypes', [App\Http\Controllers\AnalyticsController::class, 'UserTypes'] )->name('UserTypes');



// Traffic Sources
route::get('/AllTrafficSourcesU', [App\Http\Controllers\AnalyticsController::class, 'AllTrafficSourcesU'] )->name('AllTrafficSourcesU');
route::get('/AllTrafficSourcesG', [App\Http\Controllers\AnalyticsController::class, 'AllTrafficSourcesG'] )->name('AllTrafficSourcesG');
route::get('/AllTrafficSourcesE', [App\Http\Controllers\AnalyticsController::class, 'AllTrafficSourcesE'] )->name('AllTrafficSourcesE');
route::get('/RefferingSite', [App\Http\Controllers\AnalyticsController::class, 'RefferingSite'] )->name('RefferingSite');
route::get('/SearchEngine', [App\Http\Controllers\AnalyticsController::class, 'SearchEngine'] )->name('SearchEngine');
route::get('/SearchEngineOrganic', [App\Http\Controllers\AnalyticsController::class, 'SearchEngineOrganic'] )->name('SearchEngineOrganic');
route::get('/SearchEnginePaid', [App\Http\Controllers\AnalyticsController::class, 'SearchEnginePaid'] )->name('SearchEnginePaid');
route::get('/Keyword', [App\Http\Controllers\AnalyticsController::class, 'Keyword'] )->name('Keyword');
route::get('/Content', [App\Http\Controllers\AnalyticsController::class, 'Content'] )->name('Content');
route::get('/LandingPage', [App\Http\Controllers\AnalyticsController::class, 'LandingPage'] )->name('LandingPage');
route::get('/ExitPages', [App\Http\Controllers\AnalyticsController::class, 'ExitPages'] )->name('ExitPages');
route::get('/SearchKeyword', [App\Http\Controllers\AnalyticsController::class, 'SearchKeyword'] )->name('SearchKeyword'); 

// Channel Grouping
route::get('/channelGroupingNewUsers', [App\Http\Controllers\AnalyticsController::class, 'channelGroupingNewUsers'] )->name('channelGroupingNewUsers'); 
route::get('/channelGroupingSessions', [App\Http\Controllers\AnalyticsController::class, 'channelGroupingSessions'] )->name('channelGroupingSessions'); 

//Website Json File
route::post('/website-contents', [App\Http\Controllers\Analytics::class, 'website_upload'] );


//Website List
route::get('/website-list', [App\Http\Controllers\Analytics::class, 'website_user_list'] );

});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
