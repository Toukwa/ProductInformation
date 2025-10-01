@extends('layout')

@section('title', 'Edit Product Information')

@section('content')
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Product Information</h4>
          </div>
          <div class="card-body">
            <form class="row g-3" action={{ route("product.update", $index) }} method="POST">

              @csrf
              <div class="col-md-6">
                <label class="form-label">Product ID</label>
                <input type="text" name="id" class="form-control" value={{$product['id']}} required>
                <small class="text-muted">Product ID cannot be changed</small>
              </div>
              <div class="col-md-6">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value={{$product['name']}} required >
              </div>
              <div class="col-md-6">
                <label class="form-label">Product Category</label>
                <input type="text" name="categ" class="form-control" value={{$product['categ']}} required>
              </div>
              <div class="col-md-3">
                <label class="form-label">Product Quantity</label>
                <input type="number" name="qty" class="form-control" value={{$product['qty']}} required>
              </div>
              <div class="col-md-3">
                <label class="form-label">Product Price</label>
                <input type="number" name="price" step="0.01" class="form-control" value={{$product['price']}} required>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <a href="{{ route("product.list")}}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
@endsection

@section('scripts')
  
