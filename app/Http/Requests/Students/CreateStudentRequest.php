<?php

declare(strict_types=1);

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
        ];
    }

    /**
     * Get input aliaes.
     *
     * @return array<string,string>
     */
    public function attributes(): array
    {
        return [
            'first-name' => 'first name',
            'last-name' => 'last name',
        ];
    }
}
