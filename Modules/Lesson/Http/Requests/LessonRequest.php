<?php

namespace Modules\Lesson\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'title' => 'required',
            'id_number' => 'unique:lessons',
            'grade' => 'required',
            'theoretic_unit' => 'numeric',
            'practical_unit' => 'numeric',
            'prerequisites' => 'string',
            'need' => 'string',
            'teacher_id' => 'required',
            'exam_date' => 'required',
        ];
    }
}
