<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		/*return [
			'numero' => 'required|max:255|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6'
		];*/
		return [
			'numero' => 'required|max:8|unique:users',
			'username' => 'required|max:255',
			'password' => 'required|confirmed|min:6'
		];
	}

}
