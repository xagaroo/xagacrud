<?php

namespace xagaroo\xagacrud;
use View;

class Column 
{
	var $label;

	public function __construct($label)
	{
		$this->label = $label;
	}

	public function obtain($row)
	{	
		$contents = $row->{$this->name};
		$view = View::make('xagacrud::columns.' . $this->view, ['label' => $this->label, 'content' => $contents]);
		return $view->render();
	}
}
