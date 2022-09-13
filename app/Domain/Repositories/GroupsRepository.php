<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Models\Group;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
        return $this->query()
            ->withCount(['students'])
            ->get()
        ;
    }

    public function getPaginated(int $prePage): LengthAwarePaginator
    {
        return $this->query()
            ->withCount(['students'])
            ->paginate($prePage)
        ;
    }

    /**
     * @return Collection<int,Group>
     */
    public function getPaginatedWithLessOrEqualStudents(int $perPage, int $maxStudents): LengthAwarePaginator
    {
        $result = $this->query()
            ->withCount(['students'])
            ->has('students', '<=', $maxStudents)
            ->paginate($perPage)
        ;

        return $result;
    }

    /**
     * @return Builder<Group>
     */
    protected function query(): Builder
    {
        /** @var Builder<Group> */
        return $this->model()->query();
    }

    protected function model(): Group
    {
        /** @var Group */
        return parent::model();
    }
}
