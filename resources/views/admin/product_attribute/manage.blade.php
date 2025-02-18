@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Product Attribute
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('product.attribute.create') }}" class="btn btn-primary mb-3">Create Product Attribute</a>
            <div class="card">
                <div class="card-header">
                    <h4 for="all_category" class="fw-bold">All Product Attribute</h4>
                    @include('admin.messages')
                </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>#</th>
                                <th>Attribute</th>                       
                                <th>Actions</th>
                            </tr>
                            @foreach ($attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->id }}</td>
                                    <td>{{ $attribute->attribute_value }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit.attribute', $attribute->id) }}" name="edit"
                                                id="edit" class="btn btn-warning me-3">Edit</a>
                                            <form action="{{ route('delete.attribute', $attribute->id) }}" method="POST">
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
