<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->user;
		return [
			'username' => 'required|max:8',
			'numero' => 'required|max:25|unique:users,numero,' . $id
		];
	}

}