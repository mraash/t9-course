<?php

declare(strict_types=1);

namespace App\Http\Requests\Groups;

use Illuminate\Foundation\Http\FormRequest;

class IndexGroupRequest extends FormRequest
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
            'max-students' => 'nullable|int|min:1',
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
            'max-students' => 'number of maximal students',
        ];
    }
}
