<?php

namespace xagaroo\xagacrud\Controllers;

use Request;
use xagaroo\xagacrud\Controllers\AdminController;
use xagaroo\xagacrud\Models\Permission;
use xagaroo\xagacrud\Models\Role;

class RoleController extends AdminController
{

	/*protected function title()
	{
		return 'Roles';
	}*/
	protected function namespace()
	{
		return '\xagaroo\xagacrud\Models\\';
	}
	protected function path()
	{
		return 'role';
	}
	/*protected function canCreate()
	{
		return true;
	}*/
	/*protected function data()
	{
		return Role::all();
	}*/
	/*protected function model()
	{
		return new Role;
	}*/

	protected function table($contents)
	{
		$table = $this->createTable($contents);
		$table->addId();
		$table->addText('Name', 'name');
		$table->addFunction('# Usuarios', function($row) {
			return $row->users->count();
		});
		$table->addText('Display name', 'display_name');
		$table->addButton('Permissions', '/admin/role/permission/');
		$table->addSettings('Opciones', '/admin/role/');

		$table->setColgroup([
			'col-md-1', 'col-md-3', 'col-md-1', 'col-md-4', 'col-md-1', 'col-md-2'
		]);
		 
		return $table;
	}

	protected function form($item = null)
	{
		$form = $this->createForm($item);
		$form->addText('Name', 'name');
		$form->addText('Display Name', 'display_name');
		$form->addTextArea('Description', 'description'); 

		return $form;
	}

	public function permission($id)
	{
		$role = Role::find($id);
		$permissions = Permission::all();
		if ($role) {
			$selected = $role->permissions->pluck('id')->toArray();
		} else {
			$selected = [];
		}
		
		return view('xagacrud::role-permission.form', compact('role', 'permissions', 'selected'));
	}

	public function postPermission($id)
	{
		$data = Request::except('_token');
		$role = Role::find($data['id']);						//get the role
		if (isset($data['permissions'])) {
			$actual = array_keys($data['permissions']);				//get ids from perms selected in form
		} else {
			$actual = [];
		}
		
		//get previous perms in db
		if ($role) {
			$previous = $role->permissions->pluck('id')->toArray();
		} else {
			$previous = [];
		}

		$attach = array_diff($actual, $previous);				//diff to get the selected on form
		$dettach = array_diff($previous, $actual);				//diff to get the deselected on form

		foreach ($attach as $a) {
			$role->attachPermission(Permission::find($a));
		}
		foreach ($dettach as $d) {
			$role->detachPermission(Permission::find($d));
		}

		return redirect('/admin/role');
	}
}
