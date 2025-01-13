@extends('user.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
               @include('user.error')
                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
