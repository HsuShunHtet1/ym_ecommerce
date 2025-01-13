@extends('admin.layout.master')
@section('content')
<a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-primary">All Product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price</th>
                <th>View Count</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{asset($product->image)}}" style="width: 40px; border-radius: 20px" alt="">
                </td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->view_count }}</td>
            </tr>
        </tbody>
    </table>
    <p>
        {{ $product->description }}
    </p>
@endsection
