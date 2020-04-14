<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTask extends ApiRequest
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
            'list_id' => 'required|exists:lists,id',
            'description' => 'required',
            'urgency' => 'required',
        ];
    }

}
