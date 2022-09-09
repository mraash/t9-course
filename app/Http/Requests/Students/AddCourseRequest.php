<?php

declare(strict_types=1);

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class AddCourseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'course_id' => 'required|int|min:1|exists:courses,id'
        ];
    }
}
