<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommandeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'theme' => 'max:255',
            'predicateur' => 'max:255',
            'date_culte' => 'date|required',
            'nbre' => 'max:10|required',
        ];
    }
}