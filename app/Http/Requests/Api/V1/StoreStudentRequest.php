<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ];
    }

    public function firstNameInput(): string
    {
        /** @var string */
        return $this->input('first_name');
    }

    public function lastNameInput(): string
    {
        /** @var string */
        return $this->input('last_name');
    }
}
