<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages;

use Illuminate\Contracts\View\View;
use App\Domain\Repositories\GroupsRepository;
use App\Http\Requests\Pages\Groups\IndexGroupRequest;

class GroupsController extends Controller
{
    public function __construct(
        private GroupsRepository $groupsRepository
    ) {
    }

    public function showIndex(IndexGroupRequest $request): View
    {
        $maxStudents = $request->getMaxStudentsInputOrNull();

        $groups = $maxStudents === null
            ? $this->groupsRepository->getAll()
            : $this->groupsRepository->getWithLessOrEqualStudents($maxStudents)
        ;

        return $this->makeView('pages/groups/find-group', compact('groups'));
    }
}
