<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsUpdateRequest extends FormRequest
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
            "username" => "required|string",
            "email" => "required|email",
            "first_name" => "string|nullable",
            "surname" => "string|nullable",
            "gender" => "string",
            "birth_date" => "string|nullable",
            "country" => "string|nullable",
        ];
    }
}
