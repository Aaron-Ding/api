<?php
Route::group(['namespace' => 'api'], function () {
        Route::get('/leaderboard/users', '\App\Http\Controllers\LeaderBoardController@index')->name('qrcode');
});
