@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Sub Category
@endsection
@section('admin_layout')
    <div class="row">
        <form action="{{ route('store.sub.category') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 for="category_id" class="fw-bold">Create Sub Category</h5>
                    </div>
                    @include('admin.messages')
                    <div class="card-body">
                        <label for="sub_category_name" class="fw-bold mb-2">Give name of your sub category</label>
                        <input type="text" class="form-control mb-3" placeholder="Add Sub Category"
                            name="sub_category_name" id="sub_category_name">
                        @error('sub_category_name')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <label for="category_id" class="fw-bold mb-2">Select Sub Category</label>
                        <select name="category_id" id="category_id" class="form-control mb-3">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary">Add sub Category</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
