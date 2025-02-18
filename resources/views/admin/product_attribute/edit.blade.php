@extends('admin.layouts.layout')
@section('admin_page_title')
    Update Product Attribute
@endsection
@section('admin_layout')
    <div class="row">
        <form action="{{ route('update.attribute', $edit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 for="add_category" class="fw-bold">Update Product Attribute</h5>
                    </div>
                    <div class="card-body">
                        <label for="update_attribute" class="fw-bold mb-2">Give name of your category</label>
                        <input type="text" class="form-control mb-3" placeholder="Update Attribute" name="update_attribute" id="update_attribute" value="{{ $edit->attribute_value }}">
                        @error('update_attribute')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary">Update Attribute</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
