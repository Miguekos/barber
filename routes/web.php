<?php


Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');


//Login - loguot
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Registro
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');


//Usuarios
Route::resource('user','UserController');
Route::resource('barber','BarberController');
Route::resource('venta','VentaController');
Route::resource('corte','CorteController');
Route::resource('servicio','ServicioController');
Route::resource('cierre','CierreController');
Route::resource('report','ReportController');
Route::post('reporte', 'ReportController@reporte')->name('reporte');
Route::get('barberos', 'DashboardController@barberos')->name('barberos');
Route::post('barberos', 'DashboardController@cerrarBarbero')->name('barberos.store');
Route::post('barberos_cierre', 'DashboardController@barberosCierre')->name('barberosCierre.store');



//resetear contraseña
Route::get('cambioclaveform', 'DashboardController@cambioclaveform')->name('cambioclaveform.update');
// Route::get('password/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('cambioclave/{empleado}', 'DashboardController@cambioclave')->name('cambioclave');
