@extends ('layouts.default')

@section ('webTitle', 'Students')
@section ('tableTitle', 'Students')

@section ('content')
    <form>
        <div class="form-group">
            <label class="form-check-label" for="equal-or-less-input">
                From course
            </label>
            <select name="course" class="form-control">
                <option value="">-</option>
                @foreach ($courses as $course)
                    <option
                        @selected(request()->input('course') == $course->id)
                        value="{{ $course->id }}"
                    >
                        {{ $course->id }}. {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">
                    Apply
                </button>
            </div>
        </div>
    </form>

    <div class="mt-4">
        {{ $students->appends($_GET)->links() }}
    </div>

    <div class="card mt-3">
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>
                                <a
                                    class="btn btn-success"
                                    href="{{ route('students.single', $student->id) }}"
                                >
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        {{ $students->appends($_GET)->links() }}
    </div>
@endsection
