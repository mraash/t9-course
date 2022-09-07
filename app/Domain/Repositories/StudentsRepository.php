<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Models\Student;
use App\Exceptions\UndefinedEntityException;

class StudentsRepository extends Repository
{
    public function __construct(Student $model)
    {
        parent::__construct($model);
    }

    public function create(string $firstName, string $lastName): void
    {
        $student = $this->student();

        $student->first_name = $firstName;
        $student->last_name = $lastName;

        $student->save();
    }

    public function delete(int $id): void
    {
        /** @var Student|null */
        $student = $this->student()
            ->query()
            ->where('id', $id)
            ->first()
        ;

        if ($student === null) {
            throw new UndefinedEntityException();
        }

        $student->delete();
    }

    protected function student(): Student
    {
        /** @var Student */
        return parent::model();
    }
}
