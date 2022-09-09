<?php

declare(strict_types=1);

namespace App\Domain\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\CoursesRepository;
use App\Domain\Models\Course;

class CoursesService
{
    public function __construct(
        private CoursesRepository $coursesRepository
    ) {
    }

    /**
     * @return Collection<int,Course>
     */
    public function getAll(): Collection
    {
        return $this->coursesRepository->getAll();
    }
}
