@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp
<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-list"></i> Task Reports</h2>
    <div class="card mt-4">
        <div class="card-body" id="printable-table">
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
                    @foreach ($task_progress as $row)
                    <tr>
                        <td class="align-middle text-center">{{ $i++ }}</td>
                        <td class="align-middle text-center">
                            {{ $row->task_name }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $row->project_name }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $row->user_name }}
                        </td>
                        <td class="align-middle text-center">
                            @if ($row->priority == 0)
                            <span class="badge text-bg-secondary">low</span>
                            @elseif($row->priority == 1)
                            <span class="badge text-bg-warning">Medium</span>
                            @elseif($row->priority == 2)
                            <span class="badge text-bg-danger">High</span>
                            @elseif($row->priority == 3)
                            <span class="badge text-bg-danger">Critical</span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            {{ date('M d, Y', strtotime($row->end_date)) }}
                        </td>
                        <td class="align-middle text-center">
                            @if ($row->status == 0)
                            <span class="badge text-bg-secondary">Pending</span>
                            @elseif($row->status == 1)
                            <span class="badge text-bg-primary">On Progress</span>
                            @elseif($row->status == 2)
                            <span class="badge text-bg-success">Completed</span>
                            @elseif($row->status == 3)
                            <span class="badge text-bg-danger">Cancelled</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection