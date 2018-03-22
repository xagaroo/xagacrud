<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Admin title
	|--------------------------------------------------------------------------
	|
	| Default title to use in CRUD area. 
	|
	*/
	'title' => env('APP_NAME', 'Laravel ') . ' CRUD',

	/*
	|--------------------------------------------------------------------------
	| Menu items
	|--------------------------------------------------------------------------
	|
	| Set here the admin menu items, They will appear as menu options, and xagacrud
	| will try to generate routes for each one of them
	| Keys of array are the uri and the name of the controller. So 
	| 'user' key will be '/admin/user' route and will use UserController
	| Values of array are the labels and name for each menu item
	|
	*/
	'menu' => [
		'user' => 'Usuarios',
		'role' => 'Roles',
		'permission' => 'Permissions'
	],

];