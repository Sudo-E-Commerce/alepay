<?php
App::booted(function() {
    $namespace = 'Sudo\Alepay\Http\Controllers';

    Route::namespace($namespace)->name('app.')->group(function() {
        Route::get('/demo-alepay','AlepayController@demo');
        Route::post('/thanh-toan-qua-alepay','AlepayController@paySetup')->name('alepay');
    });
});