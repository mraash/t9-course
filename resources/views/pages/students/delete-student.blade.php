@extends ('layouts.default')

@section ('webTitle', 'Delete student')
@section ('tableTitle', 'Delete student')

@section ('content')
    <div class="form-group">
        <label class="form-check-label" for="delete-input">
            Student ID
        </label>
        <input
            class="form-control"
            id="delete-input"
            placeholder=""
            style="width: 120px"
        >
    </div>
    <div class="mt-2">
        <button type="button" class="btn btn-danger">
            Delete
        </button>
    </div>
@endsection
