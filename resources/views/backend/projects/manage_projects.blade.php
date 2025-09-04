@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-diagram-project"></i> New Project</h2>
    <hr>
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
                        <input type="text" name="project_name" id="" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="">Project Manager</label>
                    <select name="" id="" class="select2">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="">Category</label>
                    <select name="" id="" class="select2">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="summernote">
                    <p>Hello Summernote</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection