@extends('user.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Enter Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Choose Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

