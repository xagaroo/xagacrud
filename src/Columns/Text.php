<?php

namespace Xagaroo\Xcruds\Columns;

use Xagaroo\Xcruds\Column;

class Text extends Column 
{
	protected $view = 'standard';

	var $label;
	var $name;

	public function __construct($label, $name)
	{
		$this->label = $label;
		$this->name = $name;
	}
}
