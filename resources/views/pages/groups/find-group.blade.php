@extends ('layouts.default')

@section ('webTitle', 'Find group')
@section ('tableTitle', 'Groups')

@section ('content')
    <div class="form-group">
        <label class="form-check-label" for="equal-or-less-input">
            Equal or less
        </label>
        <input
            class="form-control"
            id="equal-or-less-input"
            placeholder=""
            style="width: 120px"
        >
        <div class="mt-2">
            <button type="button" class="btn btn-success">
                Apply
            </button>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>name</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>name</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>name</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
