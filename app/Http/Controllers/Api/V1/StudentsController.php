<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Domain\Models\Student;
use App\Domain\Repositories\StudentsRepository;
use App\Exceptions\UndefinedEntityException;
use App\Http\Requests\Api\V1\StoreStudentRequest;
use App\Http\Resources\V1\StudentResource;

class StudentsController
{
    public function __construct(
        private StudentsRepository $studentsRepository
    ) {
    }

    public function index()
    {
        $students = $this->studentsRepository->getAll();

        return StudentResource::collection($students);
    }

    public function show(int $id)
    {
        $student = $this->studentsRepository->getById($id);

        return new StudentResource($student);
    }

    public function store(StoreStudentRequest $request): array
    {
        $firstName = $request->firstNameInput();
        $lastName = $request->lastNameInput();

        $this->studentsRepository->create($firstName, $lastName);

        return [
            'success' => true,
        ];
    }

    public function destroy(int $id): array
    {
        try {
            $this->studentsRepository->delete($id);
        }
        catch (UndefinedEntityException) {
            return [
                'success' => false,
            ];
        }

        return [
            'success' => true,
        ];
    }
}
