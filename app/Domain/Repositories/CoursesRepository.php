<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Domain\Models\Course;

/**
 * @extends Repository<Course>
 */
class CoursesRepository extends Repository
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection<int,Course>
     */
    public function getAll(): Collection
    {
        return $this->query()->get();
    }
}
