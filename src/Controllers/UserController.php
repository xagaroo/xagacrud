<?php

namespace xagaroo\xagacrud\Controllers;

use App\User;
use Request;
use xagaroo\xagacrud\Controllers\AdminController;
use xagaroo\xagacrud\Models\Role;

class UserController extends AdminController
{
	/*protected function title()
	{
		return 'Usuarios!';
	}*/
	protected function path()
	{
		return 'user';
	}
	/*protected function model()
	{
		return new User;
	}*/

	protected function form($item = null)
	{
		$form = $this->createForm($item);
		$form->addText('Name', 'name');
		$form->addText('Email', 'email');
		$form->addSeparator();
		$form->addPassword('Contraseña', true); 
		$form->addSelect('Rol', 'role', Role::all()->pluck('name', 'id')->toArray());

		return $form;
	}

	protected function table($contents)
	{
		$table = $this->createTable($contents);
		$table->addId();
		$table->addText('Username', 'name');
		$table->addText('Email', 'email');
		$table->addFunction('Role', function($row) {
			return $row->roles->first()->name;
		});
		$table->addButton('Contraseña', '/admin/user/password/');
		$table->addSettings('Opciones', '/admin/user/');

		$table->setColgroup([
			'col-md-1', 'col-md-2', 'col-md-3', 'col-md-2', 'col-md-2', 'col-md-2'
		]);
		
		return $table;
	}

	public function password($id)
	{
		$user = User::find($id);
		return view('admin.users.password', compact('user'));
	}
	
	public function postPassword($id)
	{
		$data = Request::except('_token');
		return User::changePassword($id, $data);
	}
}
