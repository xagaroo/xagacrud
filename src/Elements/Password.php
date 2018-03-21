<?php

namespace Xagaroo\Xcruds\Elements;

use Xagaroo\Xcruds\Element;


class Password extends Element 
{
	protected $view = 'password';

	var $label;
	var $name;

	public function __construct($label)
	{
		$this->label = $label;
	}

	public function onlyCreate()
	{
		$this->onEdit = false;
		return $this;
	}



}
