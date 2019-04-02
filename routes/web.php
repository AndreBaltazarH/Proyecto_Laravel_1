<?php
Route::get('/cerrar_sesion','Accesos\AccesoController@cerrar_sesion')->name('cerrar_sesion');

Route::post('/acceso','Accesos\AccesoController@acceso')->name('acceso');

Route::get('/unidades','Unidades\UnidadesController@index')->name('unidad_index');

Route::get('/unidades/detalles/{id}','Unidades\UnidadesController@detalles')->name('unidad_detalle');

Route::get('/unidades/ver/{id}','Unidades\UnidadesController@ver')
->name('unidad_ver')
->where('ver','ver');

Route::delete('/unidades/{id}','Unidades\UnidadesController@eliminar')->name('unidad_eliminar');

Route::post('/unidades/detalles/ejecutar','Unidades\UnidadesController@ejecutar')
->name('unidad_ejecutar')
->where('ejecutar','ejecutar');

Route::get('/','Accesos\AccesoController@index')->name('login_index');

