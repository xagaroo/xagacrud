<?php
 

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function() {

	Route::get('/', 'xagaroo\xagacrud\Controllers\AdminController@start');

	if (config('xagacrud.menu')) {
		foreach (config('xagacrud.menu') as $slug => $label) {

			if (in_array($slug, ['user', 'role', 'permission'])) {
				$controller = 'xagaroo\xagacrud\Controllers\\' . ucfirst($slug) . 'Controller';	
			} else {
				$controller = 'App\Http\Controllers\\' . ucfirst($slug) . 'Controller';	
			}

			Route::get('/'.$slug, $controller . '@index');
			Route::get('/'.$slug.'/create', $controller . '@create');
			Route::post('/'.$slug.'/create', $controller . '@postCreate');
			Route::get('/'.$slug.'/edit/{id}', $controller . '@edit');
			Route::post('/'.$slug.'/edit/{id}', $controller . '@postEdit');	
			Route::post('/'.$slug.'/delete/{id}', $controller . '@delete');

			if ($slug == "user") {
				Route::get('/'.$slug.'/password/{id}', $controller . '@password');
				Route::post('/'.$slug.'/password/{id}', $controller . '@postPassword');	
			}
			if ($slug == "role") {
				Route::get('/'.$slug.'/permission/{id}', $controller . '@permission');
				Route::post('/'.$slug.'/permission/{id}', $controller . '@postPermission');	
			}
		}
	}

});