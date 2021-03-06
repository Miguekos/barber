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
Route::get('getitem','ProductoController@getitem')->name('getitem');
Route::resource('corte','CorteController');
Route::resource('servicio','ServicioController');
Route::get('getservice/{servicio}', 'ServicioController@getservice')->name('getservice');
Route::resource('producto','ProductoController');
Route::resource('cierre','CierreController');
Route::resource('report','ReportController');
Route::resource('gastos','GastoController');
Route::post('reporte', 'ReportController@reporte')->name('reporte');
Route::get('reportshow', 'ReportController@reportShow')->name('reportshow');
Route::post('reporteshow', 'ReportController@reporteShow')->name('reporteshow');
Route::get('barberos', 'DashboardController@barberos')->name('barberos');
Route::post('barberos', 'DashboardController@cerrarBarbero')->name('barberos.store');
Route::post('barberos_cierre', 'DashboardController@barberosCierre')->name('barberosCierre.store');
Route::get('facturas', 'VentaController@facturas')->name('facturas');


Route::get('facturasadmin', 'VentaController@facturasadmin')->name('facturasadmin');
Route::post('facturasstore', 'VentaController@facturasstore')->name('facturasadmin.store');

Route::get('productosadmin', 'ProductoController@productosadmin')->name('productosadmin');
Route::post('productosstore', 'ProductoController@productosstore')->name('productosadmin.store');






//resetear contraseña
Route::get('cambioclaveform', 'DashboardController@cambioclaveform')->name('cambioclaveform.update');
// Route::get('password/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('cambioclave/{empleado}', 'DashboardController@cambioclave')->name('cambioclave');
