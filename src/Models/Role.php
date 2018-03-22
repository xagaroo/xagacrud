<?php

namespace xagaroo\xagacrud\Models;

use App\User;
use Laratrust\Models\LaratrustRole;
use Validator;
use xagaroo\xagacrud\Models\Permission;

class Role extends LaratrustRole
{
	protected $fillable = [
		'name', 'display_name', 'description',
	];

	public function permissions(){
	   return $this->belongsToMany(Permission::class);
	}

	public function countUsers()
	{
		$name = $this->name;
		return User::whereHas('roles', function ($query) use ($name) {
			$query->where('name', '=', $name);
		})->count();
	}

	public static function validate($data)
	{
		$validationArray = [
			'name' => 'required|string|max:255',
		];

		return Validator::make($data, $validationArray);
	}

	public static function validateAndCreate($data) {
		$validation = Role::validate($data);

		if ($validation->fails()) {
			return redirect()->back()->withInput($data)->withErrors($validation->errors());
		}

		$role = Role::create($data);

		return redirect('admin/role');
	}

	public static function validateAndUpdate($data)
	{
		$validation = Role::validate($data, true);

		if ($validation->fails()) {
			return redirect()->back()->withInput($data)->withErrors($validation->errors());
		}

		$item = Role::find($data['id']);
		$item->update($data);

		return redirect('admin/role');
	}
}
