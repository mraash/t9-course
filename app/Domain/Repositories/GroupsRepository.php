<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Models\Group;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GroupsRepository extends Repository
{
    public function __construct(Group $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection<int,Group>
     */
    public function getAll(): Collection
    {
        return $this->group()
            ->query()
            ->withCount(['students'])
            ->get()
        ;
    }

    /**
     * @return Collection<int,Group>
     */
    public function getWithLessOrEqualStudents(int $maxStudents): Collection
    {
        $result = $this->group()
            ->query()
            ->withCount(['students'])
            ->has('students', '<=', $maxStudents)
            ->get()
        ;

        return $result;
    }

    protected function group(): Group
    {
        /** @var Group */
        return parent::model();
    }
}
