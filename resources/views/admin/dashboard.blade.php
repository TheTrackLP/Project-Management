@extends('admin.body.header')
@section('admin')

<style>
.hover:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}
</style>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- Top Stats Cards -->
    <div class="row g-4">
        <!-- Admins -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-dark hover shadow h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Users</h5>
                        <h2 class="fw-bold">{{ $usersCount ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-user-shield fa-3x"></i>
                </div>
                <div class="card-footer text-center">
                    <a class="text-dark" href="#">VIEW DETAILS <i class="fa-regular fa-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-dark hover shadow h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Projects</h5>
                        <h2 class="fw-bold">{{ $projectsCount ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-users fa-3x"></i>
                </div>
                <div class="card-footer text-center">
                    <a class="text-dark" href="#">VIEW DETAILS <i class="fa-regular fa-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- Projects -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-dark hover shadow h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Tasks</h5>
                        <h2 class="fw-bold">{{ $TasksCount ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-folder-open fa-3x"></i>
                </div>
                <div class="card-footer text-center">
                    <a class="text-dark" href="#">VIEW DETAILS <i class="fa-regular fa-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Pending Tasks -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-dark hover shadow h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Productivities</h5>
                        <h2 class="fw-bold">{{ $productiviesCount ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-hourglass-half fa-3x"></i>
                </div>
                <div class="card-footer text-center">
                    <a class="text-dark" href="#">View Details <i class="fa-regular fa-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">
                    Projects
                </h3>
            </div>
            <div class="card-body">
                @foreach ($allProjects as $project)
                <button type="button" class="btn btn-primary prjID"
                    value="{{ $project->id }}">{{ $project->name }}</button>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-sm-2 d-flex order-1 order-xxl-3">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tasks Status</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="taskStatusChart" width="443" height="150"
                                    style="display: block; width: 443px; height: 150px;"
                                    class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>

                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-circle text-secondary fa-fw"></i> Pending <span
                                            class="badge badge-success-light">+12%</span></td>
                                    <td class="text-end">4306</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-circle text-primary fa-fw"></i> Ongoing <span
                                            class="badge badge-danger-light">-3%</span></td>
                                    <td class="text-end">3801</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-circle text-success fa-fw"></i> Completed</td>
                                    <td class="text-end">1689</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-circle text-danger fa-fw"></i> Cancelled</td>
                                    <td class="text-end">3251</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6>Tasks</h6>
                    <div class="row kanban-board" id="board">
                        <div class="col-md-3">
                            <h6 class="text-center bg-light p-2">Pending</h6>
                            <div class="kanban-column" id="pending">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-center bg-light p-2">On Progress</h6>
                            <div class="kanban-column" id="onprogress">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <h6 class="text-center bg-light p-2">Completed</h6>
                            <div class="kanban-column" id="completed">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <h6 class="text-center bg-light p-2">Cancelled</h6>
                            <div class="kanban-column" id="cancelled">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    $(".prjID").click(function() {
        var prj_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "/admin/projects/" + prj_id + "/tasks",
            success: function(res) {
                $('#pending').empty();
                $('#onprogress').empty();
                $('#completed').empty();
                $('#cancelled').empty();


                $.each(res.task, function(key, task) {
                    var status = task.status;
                    switch (status) {
                        case 0:
                            $("#pending").append(`
                            <div class="card mb-2">
                                <div class="card-body p-2">
                                    <p>
                                    <strong>${task.task_name}</strong> 
                                    <span class="float-end badge bg-danger">High</span>
                                    </p>
                                    <p><small>Due: ${task.due_date ?? 'N/A'}</small></p>
                                    <p><small>Assigned: ${task.assigned_to ?? 'Unassigned'}</small></p>
                                </div>
                            </div>
                            `);

                            break;
                        case 1:
                            $("#onprogress").append(`
                            <div class="card mb-2">
                                <div class="card-body p-2">
                                    <p>
                                    <strong>${task.task_name}</strong> 
                                    <span class="float-end badge bg-danger">High</span>
                                    </p>
                                    <p><small>Due: ${task.due_date ?? 'N/A'}</small></p>
                                    <p><small>Assigned: ${task.assigned_to ?? 'Unassigned'}</small></p>
                                </div>
                            </div>
                            `);
                            break;

                        case 2:
                            $("#completed").append(`
                            <div class="card mb-2">
                                <div class="card-body p-2">
                                    <p>
                                    <strong>${task.task_name}</strong> 
                                    <span class="float-end badge bg-danger">High</span>
                                    </p>
                                    <p><small>Due: ${task.due_date ?? 'N/A'}</small></p>
                                    <p><small>Assigned: ${task.assigned_to ?? 'Unassigned'}</small></p>
                                </div>
                            </div>
                            `);
                            break;

                        case 3:
                            $("#cancelled").append(`
                            <div class="card mb-2">
                                <div class="card-body p-2">
                                    <p>
                                    <strong>${task.task_name}</strong> 
                                    <span class="float-end badge bg-danger">High</span>
                                    </p>
                                    <p><small>Due: ${task.due_date ?? 'N/A'}</small></p>
                                    <p><small>Assigned: ${task.assigned_to ?? 'Unassigned'}</small></p>
                                </div>
                            </div>
                            `);
                            break;
                        default:
                            break;
                    }

                });
            }

        });
    });

});
const ctx2 = document.getElementById('taskStatusChart').getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Ongoing', 'Completed', 'Cancelled'],
        datasets: [{
            data: [12, 20, 45, 18],
            backgroundColor: ['#6c757d', '#0d6efd', '#28a745', '#dc3545']
        }]
    }
});
</script>
@endsection