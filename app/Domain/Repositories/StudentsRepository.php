<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Models\Student;
use App\Exceptions\UndefinedEntityException;

class StudentsRepository extends Repository
{
    public function __construct(Student $model)
    {
        parent::__construct($model);
    }

    public function getPaginated(int $prePage): LengthAwarePaginator
    {
        return $this->student()
            ->query()
            ->orderBy('id')
            ->paginate($prePage)
        ;
    }

    public function getPaginatedFromCourse(int $courseId, int $prePage): LengthAwarePaginator
    {
        return $this->student()
            ->query()
            ->select(['students.*'])
            ->leftJoin('course_student', 'course_student.student_id', '=', 'students.id')
            ->where('course_student.course_id', $courseId)
            ->groupBy('students.id')
            ->orderBy('students.id')
            ->paginate($prePage)
        ;
    }

    public function getById(int $id): Student
    {
        return $this->student()
            ->query()
            ->where('id', $id)
            ->with(['courses'])
            ->first()
        ;
    }

    public function create(string $firstName, string $lastName): Student
    {
        $student = $this->student();

        $student->first_name = $firstName;
        $student->last_name = $lastName;

        $student->save();

        return $student;
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

    public function addCourse(int $id, int $courseId): void
    {
        $this->student()
            ->query()
            ->find($id)
            ->courses()
            ->attach($courseId)
        ;
    }

    public function removeCourse(int $id, int $courseId): void
    {
        $this->student()
            ->query()
            ->find($id)
            ->courses()
            ->detach($courseId)
        ;
    }

    protected function student(): Student
    {
        /** @var Student */
        return parent::model();
    }
}
