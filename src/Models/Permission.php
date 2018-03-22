<?php

namespace xagaroo\xagacrud\Models;

use Laratrust\Models\LaratrustPermission;
use Validator;

class Permission extends LaratrustPermission
{
	protected $fillable = [
		'name', 'display_name', 'description',
	];

public static function validate($data)
	{
		$validationArray = [
			'name' => 'required|string|max:255',
		];

		return Validator::make($data, $validationArray);
	}

	public static function validateAndCreate($data) {
		$validation = Permission::validate($data);

		if ($validation->fails()) {
			return redirect()->back()->withInput($data)->withErrors($validation->errors());
		}

		$role = Permission::create($data);

		return redirect('admin/permission');
	}

	public static function validateAndUpdate($data)
	{
		$validation = Permission::validate($data, true);

		if ($validation->fails()) {
			return redirect()->back()->withInput($data)->withErrors($validation->errors());
		}

		$item = Permission::find($data['id']);
		$item->update($data);

		return redirect('admin/permission');
	}
}
