@extends('seller.layouts.layout')
@section('seller_page_title')
    Manage Store
@endsection
@section('seller_layout')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('store.publish') }}" class="btn btn-primary mb-3">Create Store</a>
            <div class="card">
                <div class="card-header">
                    <h4 for="stores" class="fw-bold">All Store</h4>
                    @include('admin.messages')
                    <div class="card-body">
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>#</th>
                                <th>Stone Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($stores as $store)
                                <tr>
                                    <td>{{ $store->id }}</td>
                                    <td>{{ $store->store_name }}</td>
                                    <td>{{ $store->slug }}</td>
                                    <td>{{ $store->details }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit.store', $store->id) }}" name="edit"
                                                id="edit" class="btn btn-warning me-3">Edit</a>
                                            <form action="{{ route('delete.store', $store->id) }}" method="POST">
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
