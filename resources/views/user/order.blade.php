@extends('user.layout.master')

@section('content')

@if ($status == 'pending')
<h2>Your Pending Order List</h2>
@else
<h2>Your Complete Order List</h2>
@endif

@include('user.error')
<table class="table table-striped">
        <thead>
                <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Qty</th>
                        <th>Price</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($orders as $c)
                <tr>
                        <td>{{ $c->product->name }}</td>
                        <td>
                                <img src="{{ asset($c->product->image) }}"
                                        style="width:50px;border-radius:30%"
                                        alt="">
                        </td>
                        <td>{{ $c->qty }}</td>
                        <td>{{$c->product->price}}</td>
                </tr>
            @endforeach
        </tbody>
</table>

@endsection
