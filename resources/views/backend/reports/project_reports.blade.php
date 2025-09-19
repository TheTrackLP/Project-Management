@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp
<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-list"></i> Project Reports</h2>
    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Project Name</th>
                        <th class="text-center">Project Manager</th>
                        <th class="text-center">Employee Count</th>
                        <th class="text-center">Task Count</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center">Progress %</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $row)
                    <tr>
                        <td class="align-middle text-center">{{ $i++ }}</td>
                        <td class="align-middle text-center">
                            {{ $row->name }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $row->project_manager_id }}
                        </td>
                        <td class="align-middle text-center">
                        </td>
                        <td class="align-middle text-center">
                            @if (isset($task_count[$row->id]))
                            {{ $task_count[$row->id]->total_tasks }}
                            @else
                            <p>No Task As of yet</p>
                            @endif

                        </td>
                        <td class="align-middle text-center">
                            @if ($row->status == 0)
                            <span class="badge text-bg-secondary">Pending</span>
                            @elseif($row->status == 1)
                            <span class="badge text-bg-primary">Ongoing</span>
                            @elseif($row->status == 2)
                            <span class="badge text-bg-success">Completed</span>
                            @elseif($row->status == 3)
                            <span class="badge text-bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <p>{{ date('M d, Y', strtotime($row->start_date)) }}</p>
                            <p>{{ date('M d, Y', strtotime($row->end_date)) }}</p>
                        </td>
                        <td class="align-middle text-center"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection