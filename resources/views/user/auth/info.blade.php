@extends('user.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Profile
            </div>
            <div class="card-body">
                @include('user.error')
                <form action="{{ url('/profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Enter Name</label>
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="text" value="{{ $user->email }}" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Choose Image</label>
                        <input type="file" class="form-control" name="image">
                        <img src="{{ asset($user->image) }}" style="width: 50px;border-radius: 10%" alt="">
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

