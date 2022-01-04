<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'nullable|email',
            'password' => 'min:8',
            'father_name' => 'required|string',
            'national_code' => 'required|min:10',
            'birthday_date' => 'required',
            'lastـdegree' => 'required',
            'averageـofـtheـlastـdegree' => 'required|numeric',
            'gender' => 'required',
            'military_service_status' => 'required',
            'marital_status' => 'required',
            'phone_number' => 'required|numeric|min:11',
            'image' => 'file|mimes:png,jpg,jpeg',
            'salary' => 'required|numeric',
            'position' => 'required|string',
        ];
    }
}
