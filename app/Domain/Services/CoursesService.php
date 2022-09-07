<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Repositories\CoursesRepository;
use Illuminate\Database\Eloquent\Collection;

class CoursesService
{
    public function __construct(
        private CoursesRepository $coursesRepository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->coursesRepository->getAll();
    }
}
