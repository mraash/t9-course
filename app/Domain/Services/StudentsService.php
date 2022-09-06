<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Repositories\StudentsRepository;

class StudentsService
{
    public function __construct(
        private StudentsRepository $studentsRepository
    ) {
    }

    public function create(string $firstName, string $lastName): void
    {
        $this->studentsRepository->create($firstName, $lastName);
    }

    public function delete(int $id): void
    {
        $this->studentsRepository->delete($id);
    }
}
