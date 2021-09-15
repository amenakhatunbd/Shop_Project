@extends('layouts.master')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Sales  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/saless/create')}}" title="Create Customer"> Create Sales</a>
            </div>
        </div>
    </div>
</div>
   

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Id</th>
            <th>Customer_id</th>
            <th>Product_id</th>            
            <th>Actions</th>
        </tr>
        <?php $i=0?>
        @foreach ($saless as $sales)
        <tr>
            <td>{{$i+=1}}</td>
            <td>{{$sales->customer_id}}</td>
            <td>{{$sales->product_id}}</td>
            
        </tr>
        @endforeach
        
    </table>

@endsection