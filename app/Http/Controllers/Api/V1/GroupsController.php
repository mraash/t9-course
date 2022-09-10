<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Domain\Repositories\GroupsRepository;
use App\Http\Resources\V1\GroupResource;

class GroupsController
{
    public function __construct(
        private GroupsRepository $groupsRepository 
    ) {
    }

    public function index()
    {
        $groups = $this->groupsRepository->getAll();

        return GroupResource::collection($groups);
    }
}
