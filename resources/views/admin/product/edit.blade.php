@extends('admin.layout.master')
@section('content')
<a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary">All Category</a>

    <form action="{{ route('admin.category.update',$cat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Enter Name</label>
            <input type="text" name="name" value="{{$cat->name}}" class="form-control" id="">
        </div>
        <input type="submit" name="" value="Update" class="btn btn-dark" id="">
    </form>

@endsection
