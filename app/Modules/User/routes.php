<?php
$namespace = 'App\Modules\User\Controllers';
Route::group(
    ['module' => 'User', 'namespace' => $namespace],
    function () {

        Route::get("/index", 'UserController@index')->name("m_user.index");
        Route::post("/search", 'UserController@search')->name("m_user.search");
        Route::get('pagination/fetch_data', 'UserController@fetch_data');

    }
);
