@extends('layouts.app')

@section('main')
<div class="d-flex justify-content-between">
    <h5>
        <i class="bi bi-journal-richtext"></i> Product Details
    </h5>
    <a href="products/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> New Product
    </a>
</div>

<div class="col-md-12 table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>M.R.P</th>
                <th>Selling Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($products->isEmpty())
            <tr>
                <td colspan="6" class="text-center">No products available</td>
            </tr>
            @else
            @foreach($products as $product)
            @php 
$index=($products->currentPage()-1) * $products->perPage() + $loop->iteration;
            @endphp
            <tr>
                <td>{{$index}}</td>
                <td>
                    <img src="productsimg/{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}" style="width: 50px;height:50px;object-fit: contain;">
                </td>
                <td>
                    <a href="products/show/{{$product->id}}" class="text-decoration-none text-uppercase">{{ $product->name }}</a>
                </td>
                <td>Rs.{{ $product->mrp }}</td>
                <td>Rs.{{ $product->price }}</td>
                <td>
                    <a href="products/edit/{{$product->id}}" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="products/delete/{{$product->id}}" onclick="return confirm('are you sure you want to delete it?')"  class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    {{$products->links()}}
</div>
@endsection
