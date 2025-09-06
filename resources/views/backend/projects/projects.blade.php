@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp
<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-diagram-project"></i> Projects</h2>
    <hr>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('projects.create') }}" class="btn btn-primary px-4 float-end"><i
                    class="fa-solid fa-circle-plus"></i> Create
                New</a>
            <h3 class="card-title">Information Projects</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hovered dataTables">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center">Project Manager</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prjs as $data)
                    <tr>
                        <td class="text-center align-middle">{{ $i++ }}</td>
                        <td class="align-middle">
                            <p>{{ $data->name }}</p>
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ $data->cat_name }}</p>
                        </td>
                        <td class="align-middle">
                            <p>Start: <b>{{ date("M d, Y", strtotime($data->start_date)) }}</b></p>
                            <p>End: <b>{{ date("M d, Y", strtotime($data->end_date)) }}</b></p>
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ $data->prj_man }}</p>
                        </td>
                        <td class="text-center align-middle">
                            @if ($data->status == 0)
                            <span class="badge text-bg-secondary">Pending</span>
                            @elseif($data->status == 1)
                            <span class="badge text-bg-primary">Ongoing</span>
                            @elseif($data->status == 2)
                            <span class="badge text-bg-success">Completed</span>
                            @elseif($data->status == 3)
                            <span class="badge text-bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ date("M d, Y", strtotime($data->created_at)) }}</p>
                        </td>
                        <td class="text-center align-middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('projects.view', $data->id) }}">View</a>
                                    </li>
                                    <li><a href="{{ route('projects.edit', $data->id) }}" class="dropdown-item">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item" id="delete" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection