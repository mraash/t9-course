<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Models\Course;
use Illuminate\Database\Eloquent\Collection;

class CoursesRepository extends Repository
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

    public function getAll(): Collection
    {
        return $this->course()
            ->query()
            ->get()
        ;
    }

    protected function course(): Course
    {
        /** @var Course */
        return parent::model();
    }
}
