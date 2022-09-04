@extends ('layouts.default')

@section ('webTitle', 'Student')
@section ('tableTitle', 'Student')

@section ('content')
    <style>
        td.td-paddinged {
            padding: 0.75rem !important;
        }

        td.normal-padding {
            padding: 0.3rem !important;
        }
    </style>

    <div class="row mb-4 ml-1">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="font-size: 0.8em" class="align-middle td-paddinged">
                                ID
                            </td>
                            <td class="td-paddinged">
                                1
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 0.8em" class="align-middle td-paddinged">
                                First name
                            </td>
                            <td class="td-paddinged">
                                first
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 0.8em" class="align-middle td-paddinged">
                                Last name
                            </td>
                            <td class="td-paddinged">
                                last
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h4>
        Add course:
    </h4>
    <div class="form-group d-flex justify-content-between w-50">
        <select class="form-control mr-2">
            <option>Math</option>
            <option>Biology</option>
        </select>

        <button class="btn btn-success" style="text-overflow: ellipsis; white-space: nowrap;">Add</button>
    </div>

    <h4 class="mt-4">
        Current courses:
    </h4>
    <div class="card mb-4 w-50">
        <div class="card-body p-0">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td class="w-100 align-middle">
                            Math
                        </td>
                        <td class="normal-padding">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-100 align-middle">
                            Biology
                        </td>
                        <td class="normal-padding">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-100 align-middle">
                            History
                        </td>
                        <td class="normal-padding">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
