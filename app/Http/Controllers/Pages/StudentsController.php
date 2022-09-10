<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Domain\Repositories\CoursesRepository;
use App\Domain\Services\CoursesService;
use App\Domain\Services\StudentsService;
use App\Exceptions\UndefinedEntityException;
use App\Http\Requests\Pages\Students\AddCourseRequest;
use App\Http\Requests\Pages\Students\DeleteStudentRequest;
use App\Http\Requests\Pages\Students\ShowIndexStudentsRequest;
use App\Http\Requests\Pages\Students\CreateStudentRequest;
use App\Http\Requests\Pages\Students\RemoveCourseRequest;

class StudentsController extends Controller
{
    public function __construct(
        private StudentsService $studentsService
    ) {
    }

    public function showIndex(ShowIndexStudentsRequest $request, CoursesService $coursesService): View
    {
        $hasCourse = $request->input('course') !== null;
        $selectedCourseId = $hasCourse ? intval($request->input('course')) : null;

        $courses = $coursesService->getAll();
        $students = $selectedCourseId === null
            ? $this->studentsService->getAllPaginated(20)
            : $this->studentsService->getPaginatedFromCourse($selectedCourseId, 20)
        ;

        return $this->makeView(
            'pages/students/archive-students',
            compact('courses', 'students')
        );
    }

    public function showSingle(CoursesRepository $coursesRepository, int $id): View
    {
        $courses = $coursesRepository->getAll();

        try {
            $student = $this->studentsService->getById($id);
        }
        catch (UndefinedEntityException $err) {
            abort(404);
        }

        return $this->makeView('pages/students/single-student', compact('student', 'courses'));
    }

    public function showCreateForm(): View
    {
        return $this->makeView('pages/students/add-student');
    }

    public function create(CreateStudentRequest $request): RedirectResponse
    {
        $firstName = strval($request->input('first-name'));
        $lastName = strval($request->input('last-name'));

        $student = $this->studentsService->create($firstName, $lastName);

        return $this->makeRedirector()->back()->with(
            'success',
            "Successfully created student (with id $student->id)"
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

    public function addCourse(AddCourseRequest $request, int $id): RedirectResponse
    {
        $courseId = intval($request->input('course_id'));

        try {
            $this->studentsService->addCourse($id, $courseId);
        }
        catch (UndefinedEntityException) {
            return $this->makeRedirector()->back()->withErrors([
                "There is no student with id $id"
            ]);
        }

        return $this->makeRedirector()->back();
    }

    public function removeCourse(RemoveCourseRequest $request, int $id): RedirectResponse
    {
        $courseId = intval($request->input('course_id'));

        try {
            $this->studentsService->removeCourse($id, $courseId);
        }
        catch (UndefinedEntityException) {
            return $this->makeRedirector()->back()->withErrors([
                "There is no student with id $id"
            ]);
        }

        return $this->makeRedirector()->back();
    }
}
