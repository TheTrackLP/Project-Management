@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-list"></i> Productivity Reports</h2>
    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Employee Name</th>
                        <th class="text-center">Number of Tasks Assigned</th>
                        <th class="text-center">Number of Tasks Completed</th>
                        <th class="text-center">Overdue Tasks</th>
                        <th class="text-center">Productivity Rating (auto-calculated %)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-center">#</td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection