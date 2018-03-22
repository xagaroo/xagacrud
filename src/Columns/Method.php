<?php

namespace xagaroo\xagacrud\Columns;

use View;
use xagaroo\xagacrud\Column;

class Method extends Column 
{
	protected $view = 'standard';

	var $label;
	var $function;

	public function __construct($label, $function)
	{
		$this->label = $label;
		$this->function = $function;
	}

	public function obtain($row)
	{	
		$method = $this->function;
		$view = View::make('xagacrud::columns.' . $this->view, ['content' => $method($row)]);
		return $view->render();
	}
}
