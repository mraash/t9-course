<?php

declare(strict_types=1);

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class DestroyStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,string>
     */
    public function rules()
    {
        return [
            'id' => 'required|int|min:0|exists:students,id',
        ];
    }

    /**
     * Get error messages.
     *
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'id.required' => 'Id is required',
            'id.int' => 'Id shoud be an integer',
            'id.min' => 'Id shoud be positive',
            'id.exists' => 'There is no student with :attribute :input',
        ];
    }
}
