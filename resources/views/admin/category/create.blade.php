@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category
@endsection
@section('admin_layout')
    <div class="row">
        <form action="{{ route('store.category') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <h3>Create Category</h3>
                <div class="card">
                    <div class="card-header">
                        <h5 for="add_category" class="fw-bold">Create Category</h5>
                    </div>
                    <p></p>
                    <div class="card-body">
                        <label for="add_category" class="fw-bold mb-2">Give name of your category</label>
                        <input type="text" class="form-control mb-3" placeholder="Add Category" name="add_category" id="add_category">
                        @error('add_category')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary">Add Category</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
