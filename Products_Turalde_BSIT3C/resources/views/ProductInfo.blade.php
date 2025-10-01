@extends('layout')

@section('title', 'Product Information')

@section('content')
    <h1 class="text-center mb-4">Product Information</h1>

    <!-- Product Input Form -->
    <div class="card shadow-sm mb-4">

      <div class="card-body"> 
        <form action="{{route('product.add')}}" class="row g-3" method="POST">
          @csrf
          <div class="col-md-6">
            <label class="form-label">Product ID</label>
            <input type="text" name="id" class="form-control" placeholder="Enter Product ID" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Product Name" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Product Category</label>
            <input type="text" name="categ" class="form-control" placeholder="Enter Category" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Product Quantity</label>
            <input type="number" name="qty" class="form-control" placeholder="Enter Quantity" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Product Price</label>
            <input type="number" name="price" step="0.01" class="form-control" placeholder="Enter Price" required>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary me-2">Add Product</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Table for Product List Information -->
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0">Product List</h5>
          <!-- Search Bar -->
          <form class="d-flex" action="{{ route("product.list")}}" role="search" method="GET">
            <input 
              type="search" 
              id="searchbox"
              name="search"
              class="form-control me-2"
              placeholder="Search product name..." 
              value="{{ request('search') }}"
              aria-label="Search">
            <button type="submit" class="btn btn-outline-primary" type="button">Search</button>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>  
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($productlist as $index => $product)
              <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['categ'] }}</td>
                <td>{{ $product['qty'] }}</td>
                <td>${{ number_format($product['price'], 2) }}</td>
                <td>
                  <a href="{{ route('product.edit', $index)}}" class="btn btn-sm btn-warning me-2">Edit</a>

                  <form action="{{ route('product.delete', $index)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script>
      const searchBox = document.getElementById('searchbox');
      searchBox.focus();
      searchBox.setselectionRange(searchBox.value.length, searchBox.value.length);
    </script>
@endsection

@section('scripts')


 


