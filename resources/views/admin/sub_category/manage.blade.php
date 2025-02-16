@extends('admin.layouts.layout')
@section('admin_page_title')
    Manage Sun Category
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add Sub Category</a>
            <div class="card">
                <div class="card-header">
                    <h4 for="all_category" class="fw-bold">All Sub Category</h4>
                    @include('admin.messages')
                </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Sub Category</th>                             
                                <th>Actions</th>
                            </tr>
                            @foreach ($sub_categories as $sub_category)
                                <tr>
                                    <td>{{ $sub_category->id }}</td>
                                    <td>{{ $sub_category->category->category_name }}</td>
                                    <td>{{ $sub_category->sub_category_name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit.sub.category', $sub_category->id) }}" name="edit"
                                                id="edit" class="btn btn-warning me-3">Edit</a>
                                            <form action="{{ route('delete.sub.category', $sub_category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="destroy" id="destroy"
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    @endsection
