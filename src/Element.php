<?php

namespace xagaroo\xagacrud;
use View;

class Element 
{
	var $type;
	var $label;
	var $name;
	var $onCreate = true;
	var $onEdit = true;

	public function __construct($label, $name)
	{
		$this->label = $label;
		$this->name = $name;
	}

	public function obtain($item)
	{
		$view = View::make('xagacrud::elements.' . $this->view, ['label' => $this->label, 'id' => $this->name, 'item' => $item]);
		return $view->render();
	}
}
