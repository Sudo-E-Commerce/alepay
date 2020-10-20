<?php
App::booted(function() {
    $namespace = 'Sudo\Pay\Http\Controllers';

    Route::namespace($namespace)->name('app.')->group(function() {
        // alepay
        Route::get('/demo-alepay','PayController@demoAlepay');
        Route::post('/thanh-toan-qua-alepay','PayController@alepaySetup')->name('alepay');
        Route::get('/ket-qua-alepay','PayController@alepayResult');

        Route::get('/demo-onepay','PayController@demoOnepay');
        Route::post('/thanh-toan-qua-onepay','PayController@onepaySetup')->name('onepay');
        Route::get('/ket-qua-onepay','PayController@onepayResult');
    });
});