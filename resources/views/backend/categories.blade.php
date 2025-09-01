@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-4">
            <form action="{{ route('cat.store') }}" method="post" id="category_form">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add Category
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label for="cat_name">Name:</label>
                            <input type="text" name="cat_name" id="cat_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat_name">Notes:</label>
                            <textarea name="cat_notes" id="cat_notes" class="form-control" rows="9"></textarea>
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
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Notes</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $data)
                            <tr>
                                <td class="text-center align-middle">{{ $i++ }}</td>
                                <td class="text-center align-middle">
                                    <p>{{ $data->cat_name }}</p>
                                </td>
                                <td class="align-middle">
                                    <p>{{ $data->cat_notes }}</p>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" id="catEdit"
                                                    value="{{ $data->id }}">Edit</button></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('cat.delete', $data->id) }}">Delete</a>
                                            </li>
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
    $(document).on('click', '#catEdit', function() {
        var cat_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/categories/edit/" + cat_id,
            success: function(res) {
                $("#cat_name").val(res.cate.cat_name);
                $("#cat_notes").val(res.cate.cat_notes);
                $("#id").val(cat_id);

                $("#category_form").attr('action', "{{ route('cat.update') }}")
            }
        });
    });
});
</script>
@endsection