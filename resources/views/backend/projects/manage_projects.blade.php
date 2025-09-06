@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-diagram-project"></i> New Project</h2>
    <hr>
    <form action="{{ route('projects.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-warning text-white float-end">Back</button>
                    Enter Information
                </h3>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
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
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="">Project Manager</label>
                        <select name="project_manager_id" id="project_manager_id" class="select2">
                            <option value=""></option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->cat_name }} | Project Manager {{ $user->name }} |
                                {{ $user->desg_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="">Category</label>
                        <select name="category_id" id="category_id" class="select2">
                            <option value=""></option>
                            @foreach ($cate as $row)
                            <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <label for="">Team Members</label>
                        <select name="team_members[]" id="" class="select2" multiple="multiple">
                            <option value=""></option>
                            @foreach ($users as $row)
                            <option value="{{ $user->id }}">{{ $user->cat_name }} | {{ $user->name }} |
                                {{ $user->desg_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="">Status</label>
                        <select name="status" id="status" class="select2">
                            <option value="" disabled selected>Select an option</option>
                            <option value="0">Pending</option>
                            <option value="1">Ongoing</option>
                            <option value="2">Completed</option>
                            <option value="3">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="">Priority</label>
                        <select name="priority" id="priority" class="select2">
                            <option value="" disabled selected>Select an option</option>
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                            <option value="4">Critical</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="">Description</label>
                    <textarea name="description" class="summernote" id="description"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <button type="submit" class="btn btn-success my-4 rounded-pill">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection