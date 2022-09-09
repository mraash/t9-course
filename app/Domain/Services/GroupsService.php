<?php

declare(strict_types=1);

namespace App\Domain\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Domain\Models\Group;
use App\Domain\Repositories\GroupsRepository;

class GroupsService
{
    public function __construct(
        private GroupsRepository $groupsRepository
    ) {
    }

    /**
     * @return Collection<int,Group>
     */
    public function getAllGroups(): Collection
    {
        return $this->groupsRepository->getAll();
    }

    /**
     * @return Collection<int,Group>
     */
    public function getAviableGroups(int $maxStudents): Collection
    {
        return $this->groupsRepository->getWithLessOrEqualStudents($maxStudents);
    }
}
