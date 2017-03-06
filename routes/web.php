<?php

// Rutas del sitio publico
Route::group(['middleware' => ['web']], function(){

    // Authentication Routes...
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/home', 'HomeController@index');
    Route::get('/dashboard-cv2017', 'HomeController@dashboardCV2017');
});

// Rutas del sitio con sesion iniciada
Route::group(['middleware' => ['auth']], function(){
    Route::resource('/ficha', 'CV2017\FichaController');
    Route::resource('/agent', 'CV2017\AgentController');

    Route::get('/athlete/find/{identification}', 'CV2017\AthleteController@findAthlete');
    Route::get('/delivery-uniform', 'CV2017\AthleteController@getUniform');
    Route::get('/athlete/delivery-uniform/{id}', 'CV2017\AthleteController@deliveryUniform');
    Route::resource('/athlete', 'CV2017\AthleteController');

    Route::get('/products/load', 'CV2017\ProductController@load');
    Route::get('/products/loadInfo/{id}', 'CV2017\ProductController@loadInfo');
    Route::resource('/products', 'CV2017\ProductController');
    
    Route::get('/inscripciones/loadUniqueInscription/{id}', 'CV2017\InscriptionController@loadUniqueInscription');
    Route::get('/inscripciones/print/{id}', 'CV2017\InscriptionController@getPrint');
    Route::get('/inscripciones/athlete/{athlete}/product/{product}', 'CV2017\InscriptionController@countInscription');
    Route::resource('/inscripciones', 'CV2017\InscriptionController');

    // Ventas
    Route::get('/ventas/paidform/{id}', 'CV2017\VentaController@loadInfoPaid');
    Route::get('/ventas/print/{id}', 'CV2017\VentaController@getPrint');
    Route::get('/ventas/print-report', 'CV2017\VentaController@getPrintReportSale');
    Route::resource('/ventas', 'CV2017\VentaController');

    Route::get('/code/print', 'CV2017\CodeController@printCode');
    Route::resource('/codes', 'CV2017\CodeController');

    // Route Reports
    Route::get('/active-inscription', 'CV2017\ReportController@getReportActiveInscription');
    Route::get('/summary', 'CV2017\ReportController@getSummary');
    Route::get('/size', 'CV2017\ReportController@getSize');

    //routers users
    Route::resource('user','UserController');
    Route::get('profile', function () { return view('user.profile'); });
});
