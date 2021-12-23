<?php
Route::group(['namespace' => 'api'], function () {
    Route::post('/register', '\App\Http\Controllers\AuthController@registerUser');
    Route::post('/login', '\App\Http\Controllers\AuthController@loginUser');
    Route::group(['namespace' => 'leaderboard'], function () {
        Route::get('/leaderboard/guests', '\App\Http\Controllers\LeaderBoardController@index')->name('all.user');
        Route::get('/leaderboard/guest/{id}', '\App\Http\Controllers\LeaderBoardController@get')->name('all.user');

        Route::delete('/leaderboard/guest/{id}', '\App\Http\Controllers\LeaderBoardController@delete')->name(
            'delete.user'
        );
        Route::post('/leaderboard/guest/{id}', '\App\Http\Controllers\LeaderBoardController@update')->name(
            'update.user'
        );
        Route::post('/leaderboard/guest/', '\App\Http\Controllers\LeaderBoardController@create')->name(
            'create.user'
        );
    });
    Route::middleware('auth:api')->group(function () {
    });
});
