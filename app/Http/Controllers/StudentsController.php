<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Domain\Services\StudentsService;
use App\Http\Requests\Students\DeleteStudentRequest;
use App\Http\Requests\Students\StoreStudentRequest;

class StudentsController extends Controller
{
    public function __construct(
        private StudentsService $studentsService
    ) {
    }

    /**
     * Display a listing of the _____.
     */
    public function index(): View
    {
        return $this->makeView('pages.students.archive-students');
    }

    /**
     * Display the specified _____.
     */
    public function single(int $id): View
    {
        return $this->makeView('pages.students.single-student');
    }

    /**
     * Show the form for creating a new student.
     */
    public function add(): View
    {
        return $this->makeView('pages.students.add-student');
    }

    /**
     * Store a newly created student in storage.
     */
    public function create(StoreStudentRequest $request): RedirectResponse
    {
        $firstName = strval($request->input('first-name'));
        $lastName = strval($request->input('last-name'));

        $id = $this->studentsService->create($firstName, $lastName);

        return $this->makeRedirector()->back()->with(
            'success',
            "Successfully created student (with id $id)"
        );
    }

    /**
     * Show the form for deleting the student.
     */
    public function remove(): View
    {
        return $this->makeView('pages.students.delete-student');
    }

    /**
     * Remove the specified student from storage.
     */
    public function delete(DeleteStudentRequest $request): RedirectResponse
    {
        $id = intval($request->input('id'));

        $this->studentsService->delete($id);

        return $this->makeRedirector()->back()->with(
            'success',
            "Successfully deleted student with id $id"
        );
    }
}
