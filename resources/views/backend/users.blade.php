@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp

<style>
    #imgUserDisplay {
        background: #ddd;
        width: 150px;
        height: 150px;
        display: block;
        object-fit: cover;
        border-radius: 8px;
    }
</style>
<div class="container-fluid">
    <h2 class="my-4"><i class="fa-solid fa-users"></i> Team Members/Users</h2>
    <hr>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary px-4 float-end" data-bs-toggle="modal"
                data-bs-target="#newUser"><i class="fa-solid fa-circle-plus"></i>
                Create
                New</button>
            <h3 class="card-title">Information Users/Members</h3>
        </div>
        <div class="card-body">
            <table class="table table table-bordered-table-hovered dataTables">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Avatar</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Contact</th>
                        <th class="text-center">Designation</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center align-middle">{{ $i++ }}</td>
                        <td class="text-center align-middle">
                            <p></p>
                        </td>
                        <td class="text-center align-middle">
                            <p></p>
                        </td>
                        <td class="text-center align-middle">
                            <p></p>
                        </td>
                        <td class="text-center align-middle">
                            <p></p>
                        </td>
                        <td class="text-center align-middle">
                            <p></p>
                        </td>
                        <td class="text-center align-middle">
                            <p></p>
                        </td>
                        <td class="text-center align-middle">
                            <p></p>
                        </td>
                        <td class="text-center align-middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" id="desgEdit" value="">Edit</button></li>
                                    <li><a class="dropdown-item" id="delete" href="">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="newUser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Create New User</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Category</label>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                                @foreach($cat as $row)
                                <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="">Designation</label>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                                @foreach($desg as $row)
                                <option value="{{ $row->id }}">{{ $row->desg_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Phone</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Address</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="" id="imgUser" class="form-control">
                            <img id="imgUserDisplay" alt="Image insert Here" srcz="#">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success px-5">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function readIMG(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imgUserDisplay").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgUser").change(function() {
        readIMG(this);
    });
</script>
@endsection