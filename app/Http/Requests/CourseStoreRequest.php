<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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
        $id = $this->course ? ",{$this->course->id}" : '';

        return [
            'name'          => "required|string|unique:App\Models\Course,name{$id}",
            'workload'      => "required|integer",
        ];
    }
}
