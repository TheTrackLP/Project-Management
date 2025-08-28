@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-4">
            <form action="">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add Category
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cat_name">Name:</label>
                            <input type="text" name="cat_name" id="cat_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat_name">Notes:</label>
                            <textarea name="cat_notes" id="cat_notes" class="form-control" rows="9"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-success px-5">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="car-title">
                        Categories
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hovered" style="border-collapse: collapse;">
                        <colgroup>
                            <col width="3%">
                            <col width="10%">
                            <col width="20%">
                            <col width="5%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Notes</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">#</td>
                                <td>Name</td>
                                <td>Notes</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection