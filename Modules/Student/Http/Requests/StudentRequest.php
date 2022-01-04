<?php

namespace Modules\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'father_name' => 'required|string',
            'national_code' => 'required|min:10|unique:teachers',
            'birthday_date' => 'required',
            'lastـdegree' => 'required',
            'averageـofـtheـlastـdegree' => 'required|numeric',
            'gender' => 'required',
            'military_service_status' => 'required',
            'marital_status' => 'required',
            'phone_number' => 'required|numeric|min:11|unique:teachers',
            'image' => 'file|mimes:png,jpg,jpeg',
            'tuition' => 'required|numeric',
            'id_number' => 'unique:teachers'
        ];
    }
}
