@extends('admin.layout.master')
@section('content')

<div class="card">
    <div class="card-header">
        Complete Order
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('admin/order/complete') }}" class="row" method="GET">

                    <div class="form-group col-md-4">
                        <input type="date" name="start_date" id="">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="date" name="end_date" id="">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="submit" value="Filter" name="" id="">
                    </div>
                </form>
                @if (isset(request()->start_date))
                <h6 class="text text-warning">
                    Between
                    <b>
                        {{ request()->start_date }}
                    </b>
                    To
                    <b>
                        {{ request()->end_date }}
                    </b>
                    <a href="{{ url('admin/order/complete') }}" class="badge badge-primary">Show All</a>
                </h6>
                @endif
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>User</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $o)
               <tr>
                    <td>{{$o->product->name}}</td>
                    <td>{{$o->user->name}}</td>
                    <td>{{$o->qty}}</td>
                    <td>{{$o->qty * $o->product->price}}</td>
                    <td>{{$o->status}}</td>
               </tr>
               @endforeach
            </tbody>
        </table>
        {{ $order->links() }}
    </div>
</div>

@endsection
