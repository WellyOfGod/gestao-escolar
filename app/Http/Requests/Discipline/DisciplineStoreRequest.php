<?php

namespace App\Http\Requests\Discipline;

use Illuminate\Foundation\Http\FormRequest;

class DisciplineStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $id = $this->discipline ? ",{$this->discipline->id}" : '';

        return [
            'name'      => "required|string|unique:App\Models\Discipline,name{$id}",
            'course_id' => "required|exists:App\Models\Course,id"
        ];
    }

    public function messages(): array
    {
        return [
          'course_id.exists' => 'Este curso não está cadastrado'
        ];
    }
}
