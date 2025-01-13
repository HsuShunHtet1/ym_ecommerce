@extends('admin.layout.master')
@section('content')
<a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary">All Category</a>

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Enter Name</label>
            <input type="text" name="name" class="form-control" id="">
        </div>
        <input type="submit" name="" value="Create" class="btn btn-dark" id="">
    </form>

@endsection
