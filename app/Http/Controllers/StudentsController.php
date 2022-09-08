<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Repositories\StudentsRepository;
use App\Domain\Services\CoursesService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Domain\Services\StudentsService;
use App\Http\Requests\Students\DeleteStudentRequest;
use App\Http\Requests\Students\ShowIndexStudentsRequest;
use App\Http\Requests\Students\CreateStudentRequest;

class StudentsController extends Controller
{
    public function __construct(
        private StudentsRepository $studentsRepository,
        private StudentsService $studentsService
    ) {
    }

    public function showIndex(ShowIndexStudentsRequest $request, CoursesService $coursesService): View
    {
        $hasCourse = $request->input('course') !== null;
        $selectedCourseId = $hasCourse ? intval($request->input('course')) : null;

        $courses = $coursesService->getAll();
        $students = $hasCourse
            ? $this->studentsService->getPaginatedFromCourse($selectedCourseId, 20)
            : $this->studentsService->getAllPaginated(20)
        ;

        return $this->makeView(
            'pages/students/archive-students',
            compact('courses', 'students')
        );
    }

    public function showSingle(int $id): View
    {
        $student = $this->studentsRepository->getById($id);

        return $this->makeView('pages/students/single-student', compact('student'));
    }

    public function showCreateForm(): View
    {
        return $this->makeView('pages/students/add-student');
    }

    public function create(CreateStudentRequest $request): RedirectResponse
    {
        $firstName = strval($request->input('first-name'));
        $lastName = strval($request->input('last-name'));

        $id = $this->studentsService->create($firstName, $lastName);

        return $this->makeRedirector()->back()->with(
            'success',
            "Successfully created student (with id $id)"
        );
    }

    public function showDeleteForm(): View
    {
        return $this->makeView('pages/students/delete-student');
    }

    public function delete(DeleteStudentRequest $request): RedirectResponse
    {
        $id = intval($request->input('id'));

        $this->studentsService->delete($id);

        return $this->makeRedirector()->back()->with(
            'success',
            "Successfully deleted student with id $id"
        );
    }

    public function removeCourse(int $id, int $courseId): RedirectResponse
    {
        $this->studentsRepository->removeCourse($id, $courseId);

        return $this->makeRedirector()->back();
    }
}
