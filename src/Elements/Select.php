<?php

namespace Xagaroo\Xcruds\Elements;

use Xagaroo\Xcruds\Element;
use View;

class Select extends Element 
{
	protected $view = 'select';

	var $label;
	var $name;
	var $options;

	public function __construct($label, $name, $options)
	{
		$this->label = $label;
		$this->name = $name;
		$this->options = $options;
	}

	public function obtain($item)
	{
		$view = View::make('xcruds::elements.' . $this->view, ['label' => $this->label, 'id' => $this->name, 'item' => $item, 'data' => $this->options]);
		return $view->render();
	}

}
