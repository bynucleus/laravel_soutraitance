<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');

    Route::get('/feuille_temps', 'ext\feuilleController@index')->name('commandes');
    Route::get('/feuille_temps/{mission}/details', 'ext\feuilleController@show');
    Route::get('/feuille_temps/{mission}/semaine', 'ext\feuilleController@semaine');
    Route::post('/save-feuille-temps', 'ext\feuilleController@save_feuille')->name("save_feuille");



    // ------------------
    // AJAX Chart Widgets
    // ------------------
    Route::get('charts/users', 'Charts\LatestUsersChartController@response');
    Route::get('charts/new-entries', 'Charts\NewEntriesChartController@response');

    Route::crud('entreprise', 'EntrepriseCrudController');
    Route::crud('consultant', 'ConsultantCrudController');
    Route::crud('mission', 'MissionCrudController');
    Route::crud('facture', 'FactureCrudController');
    Route::crud('comptabilisation', 'ComptabilisationCrudController');
    Route::crud('devises', 'DevisesCrudController');
    Route::crud('caract-renum', 'CaractRenumCrudController');
}); // this should be the absolute last line of this file
