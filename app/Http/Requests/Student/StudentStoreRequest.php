<?php

namespace App\Http\Requests\Student;

use App\Rules\CPF;
use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
        $id = $this->student ? ",{$this->student->id}" : '';

        return [
            'name'          => 'required|string',
            'dt_birth'      => 'required|string',
            'email'         => "required|string|max:128|unique:App\Models\Student,email{$id}",
            'cpf'           => ['required', 'string', 'min:11', 'max:14',"unique:App\Models\Student,cpf{$id}", new CPF],
            'zipcode'       => 'required|string|min:8|max:9',
            'street'        => 'nullable|string',
            'complement'    => 'nullable|string',
            'district'      => 'nullable|string',
            'uf'            => 'nullable|string|max:2'

        ];
    }
}
