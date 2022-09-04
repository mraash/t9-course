@extends ('layouts.default')

@section ('webTitle', 'Add student')
@section ('tableTitle', 'Add student')

@section ('content')
    <div class="form-group">
        <label class="form-check-label" for="first-name-input">
            First Name
        </label>
        <input
            class="form-control"
            id="first-name-input"
            placeholder=""
            style="width: 280px"
        >
    </div>
    <div class="form-group">
        <label class="form-check-label" for="last-name-input">
            Last Name
        </label>
        <input
            class="form-control"
            id="last-name-input"
            placeholder=""
            style="width: 280px"
        >
    </div>
    <div class="mt-2">
        <button type="button" class="btn btn-success">
            Add
        </button>
    </div>
@endsection
