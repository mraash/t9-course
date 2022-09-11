<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Domain\Repositories\GroupsRepository;
use App\Http\Resources\V1\GroupResource;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function __construct(
        private GroupsRepository $groupsRepository
    ) {
    }

    public function index(Request $request)
    {
        $groups = $this->groupsRepository->getAll();

        $resources = GroupResource::collection($groups);

        return $this->makeSuccessResponse($resources->toArray($request));
    }
}
