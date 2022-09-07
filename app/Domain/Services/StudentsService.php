<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Repositories\StudentsRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class StudentsService
{
    public function __construct(
        private StudentsRepository $studentsRepository
    ) {
    }

    public function getAllPaginated(int $perPage): LengthAwarePaginator
    {
        return $this->studentsRepository->getPaginated($perPage);
    }

    public function getPaginatedFromCourse(int $courseId, int $perPage): LengthAwarePaginator
    {
        return $this->studentsRepository->getPaginatedFromCourse($courseId, $perPage);
    }

    public function create(string $firstName, string $lastName): int
    {
        $student = $this->studentsRepository->create($firstName, $lastName);

        return $student->id;
    }

    public function delete(int $id): void
    {
        $this->studentsRepository->delete($id);
    }
}
