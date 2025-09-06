@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp
<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-list-check"></i> Tasks</h2>
    <hr>
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn btn-primary px-4 float-end" data-bs-toggle="modal" data-bs-target="#manageTask"><i
                    class="fa-solid fa-circle-plus"></i> Create
                New</a>
            <h3 class="card-title">
                Information Tasks
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTables">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Project</th>
                        <th class="text-center">Task</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-center">{{ $i++ }}</td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item" id="delete" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="manageTask" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Task Information</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="task_name" id="task_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="">Assigned Task</label>
                                <select name="assigned_users" id="assigned_users" class="modalSelect2">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="form-group">
                                <label for="">Project</label>
                                <select name="project_id" id="project_id" class="modalSelect2">
                                    <option value=""></option>
                                    @foreach ($prjs as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Priority</label>
                                <select name="priority" id="priority" class="modalSelect2">
                                    <option value="" selected disabled>Select an option</option>
                                    <option value="1">Low</option>
                                    <option value="2">Medium</option>
                                    <option value="3">High</option>
                                    <option value="4">Critical</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="status" class="modalSelect2">
                                    <option value="" selected disabled>Select an option</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Ongoing</option>
                                    <option value="2">Completed</option>
                                    <option value="3">Cancelled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="">Description</label>
                        <textarea name="description" id="description" class="summernote"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success px-4">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#project_id").change(function() {
        var prj_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/projects/" + prj_id + "/users",
            success: function(res) {
                $('#assigned_users').empty();
                $.each(res, function(key, user) {
                    $("#assigned_users").append(
                        '<option value="' + user.id + '">' + user.name +
                        '</option>'
                    );
                });
            }
        });
    });
});
</script>
@endsection