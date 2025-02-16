@extends('admin.layouts.layout')
@section('admin_page_title')
    Update Sub Category
@endsection
@section('admin_layout')
    <div class="row">
        <form action="{{ route('update.sub.category', $edit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 for="add_category" class="fw-bold">Update Sub Category</h5>
                    </div>
                    <div class="card-body">
                        <label for="update_category" class="fw-bold mb-2">Give name of your sub category</label>
                        <input type="text" class="form-control mb-3" placeholder="Update Sub Category" name="update_sub_category" id="update_sub_category" value="{{ $edit->sub_category_name }}">
                        @error('update_sub_category')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary">Update Sub Category</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
