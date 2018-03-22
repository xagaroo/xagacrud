<?php

namespace xagaroo\xagacrud;

use View;
use xagaroo\xagacrud\Column;
use xagaroo\xagacrud\Columns\Button;
use xagaroo\xagacrud\Columns\Id;
use xagaroo\xagacrud\Columns\Method;
use xagaroo\xagacrud\Columns\Settings;
use xagaroo\xagacrud\Columns\Text;

class Table 
{
	var $columns;
	var $rows;

	var $deleteModal = false;
	var $colgroups;

	public function __construct($rows = null)
	{
		$this->rows = $rows;
	}

	public function addElement(Column $item)
	{
		$this->columns[] = $item;
		return $this;
	}

	public function addId($label = 'id')
	{
		return $this->addElement(new Id($label));
	}
	public function addText($label, $name)
	{
		return $this->addElement(new Text($label, $name));
	}
	public function addFunction($label, $function)
	{
		return $this->addElement(new Method($label, $function));
	}
	public function addButton($label, $path)
	{
		return $this->addElement(new Button($label, $path));
	}
	public function addSettings($label, $path, $edit = true, $delete = true)
	{
		if ($delete) {
			$this->deleteModal = true;
		}
		return $this->addElement(new Settings($label, $path, $edit, $delete));
	}

	public function setColgroup($colgroups)
	{
		$this->colgroups = $colgroups;
	}

	public function __toString()
	{
		$str = $this->head();

		foreach ($this->rows as $row) {
			$str .= '<tr data-id="'.$row->id.'">';
			foreach ($this->columns as $column) {
				$str .= $column->obtain($row);
			}
			$str .= '</tr>';
		}

		$str .= $this->foot();

		if ($this->deleteModal) {
			$str .= $this->deleteModal();
		}

		return $str;
	}

	public function head()
	{	
		$view = View::make('xagacrud::table-head', ['columns' => $this->columns, 'colgroups' => $this->colgroups]);
		return $view->render();
	}
	public function foot()
	{
		return '</table>';
	}
	public function deleteModal() 
	{
		$view = View::make('xagacrud::modal-delete');
		return $view->render();
	}

}