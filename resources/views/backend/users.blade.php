@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp

<style>
#imgUserDisplay {
    background: #ddd;
    width: 300px;
    height: 300px;
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
                data-bs-target="#manageInfoModal" id="clearForm"><i class="fa-solid fa-circle-plus"></i>Create
                New</button>
            <h3 class="card-title">Information Users/Members</h3>
        </div>
        <div class="card-body">
            <table class="table table table-bordered table-hovered dataTables">
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
                    @foreach ($users as $row)
                    <tr>
                        <td class="text-center align-middle">{{ $i++ }}</td>
                        <td class="text-center align-middle">
                            @if($row->avatar)
                            <p><img src="{{ asset($row->avatar) }}" alt="Employee Picture" width="50"></p>
                            @else
                            <p><img src="{{ asset('img/profile-blank.png') }}" alt="Employee Picture" width="50"></p>
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ $row->name }}</p>
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ $row->email }}</p>
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ $row->phone_number }}</p>
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ $row->desg_name }}</p>
                        </td>
                        <td class="text-center align-middle">
                            @if($row->status == 'active')
                            <span class="badge rounded-pill text-bg-success">Active</span>
                            @elseif($row->status == 'inactive')
                            <span class="badge rounded-pill text-bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            <p>{{ date('M d, Y', strtotime($row->created_at)) }}</p>
                        </td>
                        <td class="text-center align-middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item manageInfo"
                                            value="{{ $row->id }}">VIew/Edit</button>
                                    </li>
                                    <li><a class="dropdown-item" id="delete"
                                            href="{{ route('users.delete', $row->id) }}">Delete</a></li>
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

<div class="modal fade" id="manageInfoModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('users.store') }}" id="manageForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Manage Information
                    </h3>
                    <div class="buttons float-end">
                        <button type="button" class="btn btn-danger rounded-pill"><i
                                class="fa-solid fa-circle-xmark"></i>
                            Disable</button>
                        <button type="button" class="btn btn-info rounded-pill text-white"><i
                                class="fa-solid fa-user-pen"></i>
                            Edit</button>
                        <button type="button" class="btn btn-warning rounded-pill text-white" data-bs-dismiss="modal"><i
                                class="fa-solid fa-circle-xmark"></i> Close</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="curr_avatar" id="curr_avatar">
                            <label for="">Image</label>
                            <input type="file" name="avatar" id="imgUser" class="form-control mb-3">
                            <img id="imgUserDisplay" alt="Image insert Here" src="#" width="350">
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Phone</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                            <div class="form-group mb-3 hidden">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="" disabled>Select an Option</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Category</label>
                                <select name="category_id" id="category_id" class="modalSelect2">
                                    <option value=""></option>
                                    @foreach($cat as $row)
                                    <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Desgination</label>
                                <select name="designation_id" id="designation_id" class="modalSelect2">
                                    <option value=""></option>
                                    @foreach($desg as $row)
                                    <option value="{{ $row->id }}">{{ $row->desg_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 hidden">
                                <label for="">Roles</label>
                                <select name="roles" id="roles" class="form-select">
                                    <option value="" disabled>Select an Option</option>
                                    <option value="admin">Admin</option>
                                    <option value="project_manager">Project Manager</option>
                                    <option value="team_leader">Team Leader</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                        </div>
                        <div class="offset-4 col-8 mb-3 hidden">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="">Created Date</label>
                                    <p id="created_at"></p>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="">Updated Date</label>
                                    <p id="updated_at"></p>
                                </div>
                            </div>
                        </div>
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
    $(document).on('click', "#clearForm", function() {
        $("#manageForm")[0].reset();
        $("#imgUserDisplay").attr('src', "{{ asset('img/profile-blank.png') }}");
        $("#name").val("");
        $("#email").val("");
        $("#phone_number").val("");
        $("#category_id").val("").trigger("change");
        $("#designation_id").val("").trigger("change");
        $("#address").val("");
        $("#status").val("");
        $("#roles").val("");
        $("#updated_at").text("");
        $("#created_at").text("");
        $("#manageForm").attr('action', "{{ route('users.store') }}")
        $(".hidden").css('display', 'none');
        $("#id").text("");
    });
    $(document).on('click', ".manageInfo", function() {
        var user_id = $(this).val();

        $("#manageInfoModal").modal('show');

        $.ajax({
            type: "GET",
            url: '/admin/users-members/' + user_id,
            success: function(res) {
                $("#imgUserDisplay").attr('src', "{{ asset('') }}" + res.info.avatar);
                $("#curr_avatar").val(res.info.avatar);
                $("#name").val(res.info.name);
                $("#email").val(res.info.email);
                $("#phone_number").val(res.info.phone_number);
                $("#category_id").val(res.info.category_id).trigger("change");
                $("#designation_id").val(res.info.designation_id).trigger("change");
                $("#address").val(res.info.address);
                $("#status").val(res.info.status);
                $("#roles").val(res.info.roles);
                $("#id").val(user_id);
                var create_date = new Date(res.info.created_at);

                let create_year = String(create_date.getFullYear()).slice(-2);
                let create_month = create_date.toLocaleDateString('default', {
                    month: 'short'
                });
                let create_day = String(create_date.getDate()).padStart(2, '0');
                $("#created_at").text(`${create_month} ${create_day}, ${create_year}`);

                var update_date = new Date(res.info.updated_at);

                let update_year = String(update_date.getFullYear()).slice(-2);
                let update_month = update_date.toLocaleDateString('default', {
                    month: 'short'
                });
                let update_day = String(update_date.getDate()).padStart(2, '0');
                $("#updated_at").text(`${update_month} ${update_day}, ${update_year}`);

                $(".hidden").css('display', 'block');

                $("#manageForm").attr('action', "{{ route('users.update') }}");
            }
        })
    });
});

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