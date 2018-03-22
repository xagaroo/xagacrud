<?php

namespace xagaroo\xagacrud\Controllers;

use Request;
use xagaroo\xagacrud\Controllers\AdminController;

class PermissionController extends AdminController
{

	protected function namespace()
	{
		return '\xagaroo\xagacrud\Models\\';
	}
	protected function path()
	{
		return 'permission';
	}

	protected function table($contents)
	{
		$table = $this->createTable($contents);
		$table->addId();
		$table->addText('Name', 'name');
		$table->addText('Display name', 'display_name');
		$table->addSettings('Opciones', '/admin/role/');

		$table->setColgroup([
			'col-md-1', 'col-md-4', 'col-md-4', 'col-md-3'
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

}
