@extends('admin.body.header')
@section('admin')
<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-diagram-project"></i> Manage Project</h2>
    <hr>
    @if(!empty($prj_data->id))
    <form action="{{ route('projects.update') }}" method="post">
        @csrf
        @else
        <form id="myForm" action="{{ route('projects.store') }}" method="post">
            @csrf
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('projects.index') }}"
                            class="btn btn-lg btn-primary px-4 rounded-pill float-end"><i
                                class="fa-solid fa-circle-left"></i>
                            Back</a>
                        Information
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ !empty($prj_data->id) ? $prj_data->id : '' }}">
                                <label for="">Name</label>
                                <input type="text" name="name"
                                    value="{{!empty($prj_data->name) ? $prj_data->name : ''}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type="date" name="start_date"
                                    value="{{ !empty($prj_data->start_date) ? $prj_data->start_date : '' }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input type="date" name="end_date"
                                    value="{{ !empty($prj_data->end_date) ? $prj_data->end_date : ''}}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label for="">Project Manager</label>
                            <select name="project_manager_id" class="select2">
                                <option value=""></option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ ($prj_data->project_manager_id ?? '') == $user->id ? 'selected' : ''}}>
                                    {{ $user->cat_name }} | Project Manager {{ $user->name }} |
                                    {{ $user->desg_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Category</label>
                            <select name="category_id" id="category_id" class="select2">
                                <option value=""></option>
                                @foreach ($cate as $row)
                                <option value="{{ $row->id }}"
                                    {{ ($prj_data->category_id ?? '') == $row->id ? 'selected' : '' }}>
                                    {{ $row->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="">Team Members</label>
                            <select name="team_members[]" id="" class="select2" multiple="multiple">
                                <option value=""></option>
                                @foreach ($users as $row)
                                <option value="{{ $row->id }}"
                                    {{ in_array($row->id, $selectedMembers ?? []) ? 'selected' : '' }}>
                                    {{ $row->cat_name }} | {{ $row->name }} |
                                    {{ $row->desg_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <label for="">Status</label>
                            <select name="status" id="status" class="select2">
                                <option value="" disabled selected>Select an option</option>
                                <option value="0" {{ ($prj_data->status ?? '') == "0" ? 'selected' : '' }}>Pending
                                </option>
                                <option value="1" {{ ($prj_data->status ?? '') == "1" ? 'selected' : '' }}>Ongoing
                                </option>
                                <option value="2" {{ ($prj_data->status ?? '') == "2" ? 'selected' : '' }}>Completed
                                </option>
                                <option value="3" {{ ($prj_data->status ?? '') == "3" ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <label for="">Priority</label>
                            <select name="priority" id="priority" class="select2">
                                <option value="" disabled selected>Select an option</option>
                                <option value="1" {{ ($prj_data->priority ?? '') == "1" ? 'selected' : '' }}>Low
                                </option>
                                <option value="2" {{ ($prj_data->priority ?? '') == "2" ? 'selected' : '' }}>Medium
                                </option>
                                <option value="3" {{ ($prj_data->priority ?? '') == "3" ? 'selected' : '' }}>High
                                </option>
                                <option value="4" {{ ($prj_data->priority ?? '') == "4" ? 'selected' : '' }}>Critical
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <label for="">Description</label>
                        <textarea name="description" class="summernote"
                            id="description">{{ $prj_data->description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <button type="submit" class="btn btn-success my-4 rounded-pill">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#myForm').validate({
        ignore: [],
        rules: {
            name: {
                required: true,
            },
            start_date: {
                required: true,
            },
            end_date: {
                required: true,
            },
            project_manager_id: {
                required: true,
            },
            category_id: {
                required: true,
            },
            'team_members[]': {
                required: true,
            },
            status: {
                required: true,
            },
            priority: {
                required: true,
            },
            description: {
                required: true,
            },

        },
        messages: {
            name: {
                required: 'Please Enter Project Name',
            },
            start_date: {
                required: 'Please Enter Start Date',
            },
            end_date: {
                required: 'Please Enter End Date',
            },
            project_manager_id: {
                required: 'Please Select a Manager',
            },
            category_id: {
                required: 'Please Select a Category',
            },
            'team_members[]': {
                required: 'Please Select Project Members',
            },
            status: {
                required: 'Please Select a Status',
            },
            priority: {
                required: 'Please Select a Priority',
            },
            description: {
                required: 'Please Enter Project Description',
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
@endsection