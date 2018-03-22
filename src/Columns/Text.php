<?php

namespace xagaroo\xagacrud\Columns;

use xagaroo\xagacrud\Column;

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
