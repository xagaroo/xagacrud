<?php

namespace xagaroo\xagacrud\Columns;

use View;
use xagaroo\xagacrud\Column;

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
		$view = View::make('xagacrud::columns.' . $this->view, ['label' => $this->label, 'path' => $this->path . $row->id]);
		return $view->render();
	}
}
