@extends('admin.layout.master')
@section('content')
<a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-primary">All Product</a>

    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Enter Name</label>
            <input type="text" name="name" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Enter Price</label>
            <input type="number" name="price" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Choose Category</label>
            <select name="cat_id" class="form-control" id="">
                @foreach ($cat as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Enter Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="">Choose Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <input type="submit" name="" value="Create" class="btn btn-dark" id="">
    </form>

@endsection
