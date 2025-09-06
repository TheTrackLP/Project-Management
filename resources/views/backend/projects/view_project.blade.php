@extends('admin.body.header')
@section('admin')
<style>
label,
p {
    font-size: 23px;
}

.profile-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    cursor: pointer;
}

.profile-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
}

.profile-card img {
    transition: transform 0.3s ease;
}

.profile-card:hover img {
    transform: scale(1.05);
}
</style>
<div class="container-fluid mt-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Informations</h1>
            <div>
                <a href="{{ route('projects.edit', $prj_info->id) }}"
                    class="btn btn-lg btn-info px-4 text-white rounded-pill"><i class="fa-solid fa-pencil"></i> Edit</a>
                <a href="{{ route('projects.index') }}" class="btn btn-lg btn-primary px-4 rounded-pill"><i
                        class="fa-solid fa-circle-left"></i>
                    Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="mb-1">Name</label>
                    <p>{{ $prj_info->name }}</p>
                </div>
                <div class="col-md-6">
                    <label>Category</label>
                    <p>{{ $prj_info->cat_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="mb-1">Duration</label>
                    <p>
                        <i class="fa-solid fa-calendar-days"></i> <strong>Start
                            Date:</strong>{{ date('F d, Y', strtotime($prj_info->start_date)) }}
                    </p>
                    <p>
                        <i class="fa-solid fa-calendar-days"></i> <strong>End Date:</strong> <span
                            class="text-danger">{{ date('F d, Y', strtotime($prj_info->end_date)) }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <label class="mb-1">Project Manager</label>
                    <p><strong>Name:</strong> {{ $prj_info->manager_name }}</p>
                    <p><strong>Email:</strong> {{ $prj_info->manager_email }}</p>
                    <p><strong>Phone:</strong> {{ $prj_info->manager_number }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="mb-1">Description</label>
                    <p>{!! $prj_info->description !!}</p>
                </div>
                <div class="col-md-4">
                    <label class="mb-1">Status</label>
                    @if ($prj_info->status == 0)
                    <p><span class="badge bg-secondary">Pending</span></p>
                    @elseif ($prj_info->status == 1)
                    <p><span class="badge bg-primary">Ongoing</span></p>
                    @elseif ($prj_info->status == 2)
                    <p><span class="badge bg-success">Completed</span></p>
                    @elseif ($prj_info->status == 3)
                    <p><span class="badge bg-danger">Cancelled</span></p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="card-header my-3">
                <button class="btn btn-primary px-5 text-white float-end"><i class="fa-solid fa-plus"></i> Add
                    Members</button>
                <h3>Team Members</h3>
            </div>
            <div class="row">
                @foreach ($members as $row)
                <div class="card profile-card mx-auto shadow-sm mb-3 border-dark rounded-3" style="max-width: 450px;">
                    <div class="row g-0 align-items-center">
                        <div class="col-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                class="img-fluid rounded-start" alt="Profile Image">
                        </div>
                        <div class="col-8">
                            <div class="card-body p-2">
                                <p>{{ $row->member_name }}</p>
                                <p>{{ $row->member_email }}</p>
                                <p> {{ $row->cat_name }}</p>
                                <p class="text-danger"> {{ $row->desg_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection