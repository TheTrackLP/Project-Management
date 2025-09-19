@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-list"></i> Task Reports</h2>
    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Task name</th>
                        <th class="text-center">Project name</th>
                        <th class="text-center">Assigned User</th>
                        <th class="text-center">Priority</th>
                        <th class="text-center">Due Date</th>
                        <th class="text-center">Status</th>
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
                        <td class="align-middle text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection