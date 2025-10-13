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
            <a href="#" class="btn btn-primary px-4 float-end" data-bs-toggle="modal" data-bs-target="#manageTask"
                id="clearForm"><i class="fa-solid fa-circle-plus"></i> Create
                New</a>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa-solid fa-filter"></i>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="selectProject" class="select2 selectProject">
                                        <option value=""></option>
                                        @foreach ($prjs as $prj)
                                        <option value="{{ $prj->name }}">{{ $prj->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="selectStatus" class="select2 selectStatus">
                                        <option value="" selected disabled>Select an option</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="taskTable">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Project</th>
                        <th class="text-center">Task</th>
                        <th class="text-center">Assigned User</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="align-middle text-center">{{ $i++ }}</td>
                        <td class="align-middle text-center">
                            <p>{{ $task->project_name }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{ $task->task_name }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{ $task->assigned_name }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Start: <b>{{ date('M d, Y',strtotime($task->start_date)) }}</b></p>
                            <p>End: <b>{{ date('M d, Y',strtotime($task->end_date)) }}</b></p>
                        </td>
                        <td class="align-middle text-center">
                            @if ($task->status == 0)
                            <span class="badge text-bg-secondary">Pending</span>
                            @elseif($task->status == 1)
                            <span class="badge text-bg-primary">Ongoing</span>
                            @elseif($task->status == 2)
                            <span class="badge text-bg-success">Completed</span>
                            @elseif($task->status == 3)
                            <span class="badge text-bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <p>{{ date('M d, Y',strtotime($task->created_at)) }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View</a>
                                    </li>
                                    <li><button value="{{ $task->id }}" class="dropdown-item"
                                            id="editTask">Edit</button>
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

<div class="modal fade" id="manageTask" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('tasks.store') }}" method="post" id="taskForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Task Information</h3>
                    <button type="button" class="btn btn-danger rounded-pill text-white" data-bs-dismiss="modal"><i
                            class="fa-solid fa-circle-xmark"></i> Close</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="">Name</label>
                                <input type="text" name="task_name" id="task_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="">Assigned Task</label>
                                <select name="assigned_user" id="assigned_user" class="modalSelect2">
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
<script type="text/javascript">
$(document).ready(function() {
    $('#taskForm').validate({
        ignore: [],
        rules: {
            task_name: {
                required: true,
            },
            assigned_user: {
                required: true,
            },
            project_id: {
                required: true,
            },
            start_date: {
                required: true,
            },
            end_date: {
                required: true,
            },

        },
        messages: {
            task_name: {
                required: 'Please Enter Task Name',
            },
            assigned_user: {
                required: 'Please Select a Assigned Member for the Task',
            },
            project_id: {
                required: 'Please Select a Project',
            },
            start_date: {
                required: 'Please Enter a Start Date',
            },
            end_date: {
                required: 'Please Enter a End Date',
            },

        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });
});
</script>
<script>
$(document).ready(function() {
    $("#project_id").change(function() {
        var prj_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/projects/" + prj_id + "/users",
            success: function(res) {
                $('#assigned_user').empty();
                $.each(res, function(key, user) {
                    $("#assigned_user").append(
                        '<option value="' + user.id + '">' + user.name +
                        '</option>'
                    );
                });
            }
        });
    });

    $(document).on("click", "#clearForm", function() {
        $("#task_name").val("");
        $("#project_id").val("").trigger("change");
        $("#assigned_user").val("").trigger("change");
        $("#start_date").val("");
        $("#end_date").val("");
        $("#priority").val("").trigger("change");
        $("#status").val("").trigger("change");
        $("#description").summernote("code", "");
        $("#id").val("");
        $("#taskForm").attr('action', "{{ route('tasks.store') }}");
    });

    $(document).on("click", "#editTask", function() {
        var task_id = $(this).val();

        $("#manageTask").modal("show");

        $.ajax({
            type: "GET",
            url: "/admin/tasks/edit/" + task_id,
            success: function(res) {
                $("#task_name").val(res.task.task_name);
                $("#project_id").val(res.task.project_id).trigger("change");
                $("#assigned_user").val(res.task.assigned_user).trigger("change");
                $("#start_date").val(res.task.start_date);
                $("#end_date").val(res.task.end_date);
                $("#priority").val(res.task.priority).trigger("change");
                $("#status").val(res.task.status).trigger("change");
                $("#description").summernote("code", res.task.description);
                $("#id").val(task_id);
                $("#taskForm").attr('action', "{{ route('task.update') }}");
            }
        });
    });
});
</script>
@endsection