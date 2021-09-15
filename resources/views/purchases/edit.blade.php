@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Purchase</h2>
            </div>
            <div class="pull-right">
                <!-- <a class="btn btn-primary" href="{{url('')}}" title="Go back"> <i class="fas fa-backward "></i> </a> -->
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{url('/purchases')}}" method="post" enctype="multipart/form-data">
        @csrf
  
               <div class="col-md-6">
                  <div class="form-group">
                    <label>Supplier_id</label>
                    <input type="text" name="supplier_id" class="form-control" value="{{$purchase->supplier_id}}" >
                  </div>
                  <div class="form-group">
                    <label>Product_id</label>
                    <input type="text" name="product_id" class="form-control" value="{{$purchase->product_id}}" >
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{$purchase->quantity}}" >
                  </div>
                  <div class="form-group">
                    <label>Unit Price</label>
                    <input type="text" name="unitPrice" class="form-control" value="{{$purchase->unitPrice}}" >
                  </div>
                  <div class="form-group">
                    <label>Total price</label>
                    <input type="text" name="totalprice" class="form-control" value="{{$purchase->totalprice}}" >
                  </div>
                   
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit" required>
                  </div>

    </form>

@endsection