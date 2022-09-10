<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages;

use Illuminate\Contracts\View\View;
use App\Domain\Services\GroupsService;
use App\Http\Requests\Pages\Groups\IndexGroupRequest;

class GroupsController extends Controller
{
    public function __construct(
        private GroupsService $groupsService
    ) {
    }

    public function showIndex(IndexGroupRequest $request): View
    {
        $maxStudents = $request->getMaxStudentsInputOrNull();

        $groups = $maxStudents === null
            ? $this->groupsService->getAll()
            : $this->groupsService->getAviable($maxStudents)
        ;

        return $this->makeView('pages/groups/find-group', compact('groups'));
    }
}
