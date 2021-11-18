<?php
Route::group(['namespace' => 'api'], function () {
    Route::post('/register', '\App\Http\Controllers\AuthController@registerUser');
    Route::post('/login', '\App\Http\Controllers\AuthController@loginUser');
    Route::middleware('auth:api')->group(function () {
        Route::group(['namespace' => 'leaderboard'], function () {
            Route::get('/leaderboard/users', '\App\Http\Controllers\LeaderBoardController@index')->name('all.user');
            Route::get('/leaderboard/user/{id}', '\App\Http\Controllers\LeaderBoardController@get')->name('all.user');

            Route::delete('/leaderboard/user/{id}', '\App\Http\Controllers\LeaderBoardController@delete')->name(
                'delete.user'
            );
            Route::post('/leaderboard/user/{id}', '\App\Http\Controllers\LeaderBoardController@update')->name(
                'update.user'
            );
            Route::post('/leaderboard/user/', '\App\Http\Controllers\LeaderBoardController@create')->name(
                'create.user'
            );
        });
    });
});
