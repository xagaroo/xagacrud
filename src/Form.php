<?php

namespace xagaroo\xagacrud;

use View;
use xagaroo\xagacrud\Element;
use xagaroo\xagacrud\Elements\Password;
use xagaroo\xagacrud\Elements\Select;
use xagaroo\xagacrud\Elements\Separator;
use xagaroo\xagacrud\Elements\Text;
use xagaroo\xagacrud\Elements\Textarea;

class Form 
{
	var $class = 'form-horizontal';
	var $method = 'post';
	var $action;
	var $items;
	var $unit;

	public function __construct($action, $unit = null)
	{
		$this->action = $action;
		$this->unit = $unit;
	}

	public function addElement(Element $item)
	{
		$this->items[] = $item;
		return $this;
	}

	public function __toString()
	{
		$str = $this->start();

		if ($this->unit) {
			$view = View::make('xagacrud::form-id', ['item' => $this->unit]);
			$str .= $view->render();
		}

		if ($this->items) {
			foreach ($this->items as $present) {
				if (((!$this->unit) && ($present->onCreate)) || (($this->unit) && $present->onEdit)) {
					$str .= $present->obtain($this->unit);	
				}
			}
		}

		$str .= $this->submit();
		$str .= $this->stop();

		return $str;
	}

	public function start()
	{
		return '<form class="'.$this->class.'" role="form" method="'.$this->method.'" action="/'.$this->action.'">' . csrf_field();
	}
	public function submit()
	{
		$view = View::make('xagacrud::form-submit');
		return $view->render();
	}
	public function stop()
	{
		return '</form>';
	}




	public function addText($label, $name)
	{
		return $this->addElement(new Text($label, $name));
	}
	public function addSeparator()
	{
		return $this->addElement(new Separator());
	}
	public function addPassword($label, $onlyCreate = false)
	{	
		$password = new Password($label);
		$password->onEdit = !$onlyCreate;
		return $this->addElement($password);
	}
	public function addSelect($label, $name, $items)
	{
		return $this->addElement(new Select($label, $name, $items));
	}
	public function addTextarea($label, $name)
	{
		return $this->addElement(new Textarea($label, $name));
	}

}
