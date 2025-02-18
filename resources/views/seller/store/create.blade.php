
@extends('seller.layouts.layout')
@section('seller_page_title')
    Create Store
@endsection
@section('seller_layout')
    <div class="row">
        <form action="{{ route('store.publish') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 for="store_name" class="fw-bold">Create Store</h5>
                    </div>
                    <p></p>
                    <div class="card-body">
                        <label for="store_name" class="fw-bold mb-2">Give name of your store</label>
                        <input type="text" class="form-control mb-3" placeholder="Farhad Store..." name="store_name" id="store_name">
                        @error('store_name')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <label for="details" class="fw-bold mb-2">Description of your store</label>
                         <textarea class="form-control mb-3" name="details" id="details" placeholder="Description..."></textarea>
                        @error('details')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <label for="slug" class="fw-bold mb-2">Slug</label>
                        <input type="text" class="form-control mb-3" placeholder="slug..." name="slug" id="slug">
                        @error('slug')
                            <p class="text-warning">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary">Add Store</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
