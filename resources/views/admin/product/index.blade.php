@extends('admin.layout.master')
@section('content')
<a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary">Create Prpduct</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>
                    <img src="{{asset($c->image)}}" style="width: 40px; border-radius: 20px" alt="">
                </td>
                <td>{{ $c->category->name }}</td>
                <td>
                    <a href="{{route('admin.product.edit',$c->id)}}" class="badge badge-success">Update</a>
                    <a href="{{route('admin.product.show',$c->id)}}" class="badge badge-dark text-white">Detail</a>
                    <form action="{{route('admin.product.destroy',$c->id)}}" class="d-inline" id="delete-{{$c->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="confirm('Delete?') ? document.getElementById('delete-{{$c->id}}').submit() : false;" class="badge badge-danger">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $products->links() }}
@endsection
