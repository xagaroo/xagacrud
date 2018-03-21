<?php

namespace Xagaroo\Xcruds\Columns;

use View;
use Xagaroo\Xcruds\Column;

class Settings extends Column 
{
	protected $view = 'settings';

	var $label;
	var $path;
	var $edit;
	var $delete;

	public function __construct($label, $path, $edit = true, $delete = true)
	{
		$this->label = $label;
		$this->path = $path;
		$this->edit = $edit;
		$this->delete = $delete;
	}

	public function obtain($row)
	{	
		$view = View::make('xcruds::columns.' . $this->view, 
			[
				'label' => $this->label, 
				'path' => $this->path,
				'edit' => $this->edit,
				'delete' => $this->delete,
				'id' => $row->id
			]
		);
		return $view->render();
	}
}
