@extends('admin.body.header')
@section('admin')

@php $i = 1; @endphp

<style>
.profile-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border: 1px solid #f0f0f0;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.profile-card img {
    border-radius: 12px;
    object-fit: cover;
}

.text-size {
    font-size: 20px;
}
</style>

<div class="container-fluid mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <h1 class="fw-bold">Project Information</h1>
            <div>
                <a href="{{ route('projects.edit', $prj_info->id) }}" class="btn btn-info text-white rounded-pill px-4">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label>Name</label>
                    <p class="fs-5">{{ $prj_info->name }}</p>
                </div>
                <div class="col-md-6">
                    <label>Category</label>
                    <p class="fs-5">{{ $prj_info->cat_name }}</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 text-size">
                    <label>Duration</label>
                    <p><i class="fa-solid fa-calendar-day text-primary"></i>
                        <strong>Start:</strong> {{ date('F d, Y', strtotime($prj_info->start_date)) }}
                    </p>
                    <p><i class="fa-solid fa-calendar-check text-danger"></i>
                        <strong>End:</strong> {{ date('F d, Y', strtotime($prj_info->end_date)) }}
                    </p>
                </div>
                <div class="col-md-6 text-size">
                    <label>Project Manager</label>
                    <p><i class="fa-solid fa-user"></i> {{ $prj_info->manager_name }}</p>
                    <p><i class="fa-solid fa-envelope"></i> {{ $prj_info->manager_email }}</p>
                    <p><i class="fa-solid fa-phone"></i> {{ $prj_info->manager_number }}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-9">
                    <label>Description</label>
                    <div class="border p-3 rounded bg-light">
                        {!! $prj_info->description !!}
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <label>Status</label>
                    <div class="fs-5 mt-2">
                        @if ($prj_info->status == 0)
                        <span class="badge bg-secondary">Pending</span>
                        @elseif ($prj_info->status == 1)
                        <span class="badge bg-primary">Ongoing</span>
                        @elseif ($prj_info->status == 2)
                        <span class="badge bg-success">Completed</span>
                        @elseif ($prj_info->status == 3)
                        <span class="badge bg-danger">Cancelled</span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold text-secondary">Team Members</h3>
                <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Members</button>
            </div>
            <div class="row g-3">
                @foreach ($members as $row)
                <div class="col-md-4 col-lg-3">
                    <div class="card profile-card p-3 shadow-sm">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($row->member_avatar ?? 'img/profile-blank.png') }}"
                                class="img-fluid me-3" width="70" height="70" alt="Profile">
                            <div>
                                <h6 class="fw-bold mb-0">{{ $row->member_name }}</h6>
                                <small class="text-muted">{{ $row->member_email }}</small>
                                <p class="mb-0">{{ $row->cat_name }}</p>
                                <p class="text-danger fw-semibold">{{ $row->desg_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <h3 class="fw-bold text-secondary mb-3">Project Tasks</h3>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Task</th>
                            <th class="text-center">Assigned User</th>
                            <th class="text-center">Duration</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project_tasks as $task)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->task_assigned }}</td>
                            <td>
                                <span class="badge bg-light text-dark">
                                    Start: {{ date('M d, Y',strtotime($task->start_date)) }}
                                </span>
                                <br>
                                <span class="badge bg-light text-dark">
                                    End: {{ date('M d, Y',strtotime($task->end_date)) }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                @if ($task->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @elseif($task->status == 1)
                                <span class="badge bg-primary">Ongoing</span>
                                @elseif($task->status == 2)
                                <span class="badge bg-success">Completed</span>
                                @elseif($task->status == 3)
                                <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td class="text-center">{{ date('M d, Y',strtotime($task->created_at)) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        <li><button value="{{ $task->id }}" class="dropdown-item"
                                                id="editTask">Edit</button></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
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
</div>
<div class="modal fade" id="manageTask" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('tasks.store') }}" method="post" id="taskForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="project-title"></h3>
                    <button type="button" class="btn btn-danger rounded-pill text-white" data-bs-dismiss="modal"><i
                            class="fa-solid fa-circle-xmark"></i> Close</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="">Name</label>
                                <input type="text" name="task_name" id="task_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="">Assigned Task</label>
                                <select name="assigned_user" id="assigned_user" class="modalSelect2">
                                    <option value=""></option>
                                    @foreach ($members as $task_member)
                                    <option value=" {{ $task_member->id }}">{{ $task_member->member_name }} |
                                        {{ $task_member->id }}</option>
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
    $(document).on("click", "#editTask", function() {
        var task_id = $(this).val();
        $("#manageTask").modal("show");

        $.ajax({
            type: "GET",
            url: "/admin/tasks/edit/" + task_id,
            success: function(res) {
                console.log(res)
                $("#task_name").val(res.task.task_name);
                $("#project-title").text(res.task.project_name);
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