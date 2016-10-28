<?php

//Get locales from database
$locales = DB::table('rainlab_translate_locales')
    ->where('is_enabled', true)
    ->get()
;

foreach($locales as $language)
{
    $prefix=($language->is_default ? '' : $language->code.'/');

    Route::group(['prefix' => $prefix], function()
    {
        Route::get('/', 'PageController@home');

        Route::get('search', 'PageController@search_redirect');
        Route::get('{search}/search', 'PageController@search');
        Route::get('plan/search/print/{print}', 'PrintController@plan_list')->where('print', '(html)');;

        Route::get('tender/{id}', 'PageController@tender');
        Route::get('plan/{id}', 'PageController@plan');

        Route::post('form/data/{type}', 'FormController@data');
        Route::post('{search}/form/check/{type}', 'FormController@check');
        Route::post('{search}/form/search', 'FormController@search');
        Route::post('form/autocomplete/{type}', 'FormController@autocomplete');

        Route::get('tender/{id}/print/{type}/{print}', 'PrintController@one')->where('print', '(pdf|html)');
        Route::get('tender/{id}/print/{type}/{print}/{lot_id?}', 'PrintController@one')->where('print', '(pdf|html)');

        #Route::get('{url}', 'ErrorController@notfound');
        Route::get('error/404', 'ErrorController@notfound');
        #Route::get('error/500', 'ErrorController@systemerror');

        $pages = \App\Page::where('is_disabled', false)->get();

        foreach ($pages as $page) {
            Route::get($page->url, 'PageController@page');
        }
    });
}

Route::post('feedback', 'FeedbackController@store');

Route::get('json/platforms/{type}', 'JsonController@platforms');
Route::get('json/announced', 'JsonController@announced_tenders');

Route::post('jsonforms/{slug}', 'JsonFormController@submit');