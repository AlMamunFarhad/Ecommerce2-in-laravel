@extends('admin.layouts.layout')
@section('admin_page_title')
    Manage Category
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add Category</a>
            <div class="card">
                <div class="card-header">
                    <h4 for="all_category" class="fw-bold">All Category</h4>
                    @if (session('success'))
                        <div class="m-3">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @elseif (session('delete'))
                        <div class="m-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit.category', $category->id) }}" name="edit"
                                                id="edit" class="btn btn-warning me-3">Edit</a>
                                            <form action="{{ route('delete.category', $category->id) }}" method="POST">
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
