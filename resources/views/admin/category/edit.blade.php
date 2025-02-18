@extends('admin.layouts.layout')
@section('admin_page_title')
    Update Category
@endsection
@section('admin_layout')
    <div class="row">
        <form action="{{ route('update.category', $edit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 for="add_category" class="fw-bold">Update Category</h5>
                    </div>
                    <div class="card-body">
                        <label for="update_category" class="fw-bold mb-2">Give name of your category</label>
                        <input type="text" class="form-control mb-3" placeholder="Update Category" name="update_category" id="update_category" value="{{ $edit->category_name }}">
                        @error('update_category')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary">Update Category</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
