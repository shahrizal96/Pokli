<?php
    Route::group(['middleware' => ['web']], function () {
        // Route::view('/purchase', 'gapsap::index');

        Route::get('/purchase', 'Artanis\GapSap\Http\Controllers\GapSapController@index')->defaults('_config', [
            'view' => 'gapsap::index'
        ])->name('gapsap.index');
        Route::post('/purchase/form', 'Artanis\GapSap\Http\Controllers\GapSapController@form')->defaults('_config', [
            'view' => 'gapsap::form.index'
        ])->name('gapsap.form');
        Route::post('/purchase/form-submit', 'Artanis\GapSap\Http\Controllers\GapSapController@formSubmit')->defaults('_config', [
            'view' => 'gapsap::form.submit'
        ])->name('gapsap.form-submit');

        Route::get('/buyback', 'Artanis\GapSap\Http\Controllers\BuybackController@index')->defaults('_config', [
            'view' => 'gapsap::buyback.index'
        ])->name('gapsap.buyback.index');
        Route::post('/buyback/confirm', 'Artanis\GapSap\Http\Controllers\BuybackController@confirm')->defaults('_config', [
            'view' => 'gapsap::buyback.confirm'
        ])->name('gapsap.buyback.confirm');
        Route::post('/buyback/confirm-submit', 'Artanis\GapSap\Http\Controllers\BuybackController@confirmSubmit')->defaults('_config', [
            'view' => 'gapsap::buyback.confirm-submit'
        ])->name('gapsap.buyback.confirm-submit');
    // });

    // Route::group(['middleware' => ['web']], function () {

        // Route::get('billplz/redirect', 'Artanis\BillPlz\Http\Controllers\StandardController@redirect')->name('billplz.redirect');

        // Route::get('billplz/success', 'Artanis\BillPlz\Http\Controllers\StandardController@success')->name('billplz.success');

        // Route::get('billplz/cancel', 'Artanis\BillPlz\Http\Controllers\StandardController@cancel')->name('billplz.cancel');

        // Route::get('billplz/verify', 'Artanis\BillPlz\Http\Controllers\StandardController@verify')->name('billplz.verify');

        Route::get('gapsap/billplz/redirect', 'Artanis\GapSap\Http\Controllers\StandardController@redirect')->name('gapsap.redirect');

        Route::get('gapsap/billplz/success', 'Artanis\GapSap\Http\Controllers\StandardController@success')->name('gapsap.success');

        Route::get('gapsap/billplz/cancel', 'Artanis\GapSap\Http\Controllers\StandardController@cancel')->name('gapsap.cancel');

        Route::get('gapsap/billplz/verify', 'Artanis\GapSap\Http\Controllers\StandardController@verify')->name('gapsap.verify');

        Route::get('gapsap/billplz/redirect-away', 'Artanis\GapSap\Http\Controllers\StandardController@redirectBillPlz')->name('gapsap.redirectBillPlz');
    });
