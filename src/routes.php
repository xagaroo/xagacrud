<?php
 

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function() {

	Route::get('/', 'xagaroo\xagacrud\Controllers\AdminController@start');

	foreach (config('xagacrud.menu') as $slug => $label) {

		$controller = 'App\Http\Controllers\Admin\\' . ucfirst($slug) . 'Controller';

		Route::get('/'.$slug, $controller . '@index');
		Route::get('/'.$slug.'/create', $controller . '@create');
		Route::post('/'.$slug.'/create', $controller . '@postCreate');
		Route::get('/'.$slug.'/edit/{id}', $controller . '@edit');
		Route::post('/'.$slug.'/edit/{id}', $controller . '@postEdit');	
		Route::get('/'.$slug.'/password/{id}', $controller . '@password');
		Route::post('/'.$slug.'/password/{id}', $controller . '@postPassword');	
		Route::post('/'.$slug.'/delete/{id}', $controller . '@delete');
	}

});