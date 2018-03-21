<?php

namespace Xagaroo\Xcruds\Columns;

use View;
use Xagaroo\Xcruds\Column;

class Button extends Column 
{
	protected $view = 'button';

	var $label;
	var $path;

	public function __construct($label, $path)
	{
		$this->label = $label;
		$this->path = $path;
	}

	public function obtain($row)
	{	
		$view = View::make('xcruds::columns.' . $this->view, ['label' => $this->label, 'path' => $this->path . $row->id]);
		return $view->render();
	}
}
