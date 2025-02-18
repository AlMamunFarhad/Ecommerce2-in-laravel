@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Product Attribute
@endsection
@section('admin_layout')
    <div class="row">
        <form action="{{ route('store.product.attribute') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 for="attribute_value" class="fw-bold">Create Product Attribute</h5>
                    </div>
                    <p></p>
                    <div class="card-body">
                        <label for="attribute_value" class="fw-bold mb-2">Give name of your product attribute</label>
                        <input type="text" class="form-control mb-3" placeholder="XL" name="attribute_value" id="attribute_value">
                        @error('attribute_value')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary">Add Category</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
