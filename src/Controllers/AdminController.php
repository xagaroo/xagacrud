<?php

namespace xagaroo\xagacrud\Controllers;

use App\Http\Controllers\Controller;
use Request;
use xagaroo\xagacrud\Form;
use xagaroo\xagacrud\Table;

class AdminController extends Controller
{

	public function start()
	{
		return view('xagacrud::start');
	}
	protected function title()
	{
		$name = config('xagacrud.menu')[$this->path()];
		return $name;
	}
	protected function namespace()
	{
		return 'App\\';
	}
	protected function model()
	{
		$name = $this->namespace() . ucfirst($this->path());
		return new $name();
	}

	public function index()
	{
		if (method_exists($this, 'data')) {
			$data = $this->data();
		} else {
			$data = $this->model()::all();
		}

		$table = $this->table($data);
		$title = $this->title();
		$canCreate = method_exists($this, 'canCreate') ? $this->canCreate() : true;
		$path = $this->path();
		return view('xagacrud::index', compact('table', 'title', 'canCreate', 'path'));
	}

	public function create()
	{
		$form = $this->form();
		$title = $this->title();
		$path = $this->path();
		return view('xagacrud::form', compact('form', 'title', 'path'));
	}

	public function postCreate()
	{
		$data = Request::except('_token');
		$model = $this->model();

		return $model::validateAndCreate($data);
	}

	public function edit($id)
	{
		$model = $this->model();
		$item = $model::find($id);
		$form = $this->form($item);
		$title = $this->title();
		$path = $this->path();
		return view('xagacrud::form', compact('form', 'title', 'path'));
	}

	public function postEdit($id)
	{
		$data = Request::except('_token');
		$model = $this->model();

		return $model::validateAndUpdate($data);
	}

	public function delete($id)
	{
		$model = $this->model();
		$item = $model::whereId($id)->first();
		$result = $item->delete();

		$array = [
			'result' => $result,
			'id' => $id
		];

		return response()->json($array);
	}

	protected function form($item = null)
	{
		return $this->createForm($item);
	}
	protected function table($contents)
	{
		return $this->createTable($contents);
	}

	protected function createForm($item = null) {
		return new Form(Request::path(), $item);
	}
	protected function createTable($contents) {
		return new Table($contents);
	}
}
