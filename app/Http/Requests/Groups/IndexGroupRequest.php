<?php

declare(strict_types=1);

namespace App\Http\Requests\Groups;

use Illuminate\Foundation\Http\FormRequest;

class IndexGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string,string>
     */
    public function rules(): array
    {
        return [
            'max-students' => 'nullable|int|min:1',
        ];
    }

    /**
     * @return array<string,string>
     */
    public function attributes(): array
    {
        return [
            'max-students' => 'number of maximal students',
        ];
    }
}
