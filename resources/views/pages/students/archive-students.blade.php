@extends ('layouts.default')

@section ('webTitle', 'Students')
@section ('tableTitle', 'Students')

@section ('content')
    <div class="form-group">
        <select class="form-control">
            <option>-</option>
            <option>Math</option>
            <option>Biology</option>
        </select>
    </div>
    <div class="card mb-4">
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>first</td>
                        <td>last</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>first</td>
                        <td>last</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>first</td>
                        <td>last</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <nav>
        <ul class="pagination">
            <li class="page-item active">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
        </ul>
    </nav>
@endsection
