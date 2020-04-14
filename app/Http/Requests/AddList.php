<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddList extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'user_id' => 'required|exists:users,id'
        ];
    }

}
