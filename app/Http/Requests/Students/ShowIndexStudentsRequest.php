<?php

declare(strict_types=1);

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class ShowIndexStudentsRequest extends FormRequest
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
            'course' => 'nullable|int|min:0|exists:courses,id',
        ];
    }
}
