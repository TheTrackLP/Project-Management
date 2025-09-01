@extends('admin.body.header')
@section('admin')
@php
$d = 1;
@endphp
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-4">
            <form action="{{ route('desig.store') }}" method="post" id="desg_form">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add Designation
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label for="desg_name">Name:</label>
                            <input type="text" name="desg_name" id="desg_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" selected disable></option>
                                @foreach ($cate as $data)
                                <option value="{{ $data->id }}">{{ $data->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="desg_notes">Notes:</label>
                            <textarea name="desg_notes" id="desg_notes" class="form-control" rows="9"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success px-5">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="car-title">
                        Designations
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hovered" style="border-collapse: collapse;">
                        <colgroup>
                            <col width="3%">
                            <col width="10%">
                            <col width="10%">
                            <col width="20%">
                            <col width="5%">
                        </colgroup>
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Notes</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desg as $data)
                            <tr>
                                <td class="text-center align-middle">{{ $d++ }}</td>
                                <td class="align-middle">
                                    <p>{{ $data->desg_name }}</p>
                                </td>
                                <td class="text-center align-middle">
                                    <p>{{ $data->cat_name }}</p>
                                </td>
                                <td class="align-middle">
                                    <p>{{ $data->desg_notes }}</p>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" id="desgEdit"
                                                    value="{{ $data->id }}">Edit</button></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('desig.delete', $data->id) }}">Delete</a></li>
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
</div>

<script>
$(document).ready(function() {
    $(document).on('click', "#desgEdit", function() {
        var desg_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "/admin/designations/edit/" + desg_id,
            success: function(res) {
                $("#desg_name").val(res.desg.desg_name);
                $("#category_id").val(res.desg.category_id);
                $("#desg_notes").val(res.desg.desg_notes);
                $("#id").val(desg_id);

                $("#desg_form").attr("action", "{{ route('desig.update') }}");
            }
        });
    });
});
</script>
@endsection