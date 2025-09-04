@extends('admin.body.header')
@section('admin')

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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection