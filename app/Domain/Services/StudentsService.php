<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Models\Student;
use App\Domain\Repositories\StudentsRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentsService
{
    public function __construct(
        private StudentsRepository $studentsRepository
    ) {
    }

    public function getAllPaginated(int $perPage): LengthAwarePaginator
    {
        return $this->studentsRepository->getAllPaginated($perPage);
    }

    public function getPaginatedFromCourse(int $courseId, int $perPage): LengthAwarePaginator
    {
        return $this->studentsRepository->getPaginatedFromCourse($courseId, $perPage);
    }

    public function getById(int $id): Student
    {
        return $this->studentsRepository->getById($id);
    }

    public function create(string $firstName, string $lastName): Student
    {
        return $this->studentsRepository->create($firstName, $lastName);
    }

    public function delete(int $id): void
    {
        $this->studentsRepository->delete($id);
    }

    public function addCourse(int $id, int $courseId): void
    {
        $this->studentsRepository->addCourse($id, $courseId);
    }

    public function removeCourse(int $id, int $courseId): void
    {
        $this->studentsRepository->removeCourse($id, $courseId);
    }
}
