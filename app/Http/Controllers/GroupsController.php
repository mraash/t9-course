<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Domain\Services\GroupsService;
use App\Http\Requests\Groups\IndexGroupRequest;

class GroupsController extends Controller
{
    public function __construct(
        private GroupsService $groupsService
    ) {
    }

    /**
     * Display a listing of the groups.
     */
    public function index(IndexGroupRequest $request): View
    {
        $maxStudents = $request->input('max-students') === null
            ? null
            : intval($request->input('max-students'))
        ;

        $groups = $this->groupsService->getGroupList($maxStudents);

        return $this->makeView('pages.groups.find-group', compact('groups'));
    }
}
