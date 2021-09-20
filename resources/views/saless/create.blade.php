@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Sales</h2>
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
    
    <form action="{{url('/saless')}}" method="post" enctype="multipart/form-data">
        @csrf
  
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Customer</label>
                    <select name="customer_id" class="form-control">
                    <option value="" selected disabled>(:--Select Supplier--:)</option>
                      @foreach($customer as $eachCustomer)  
                      <option value="{{$eachCustomer->id}}">{{$eachCustomer->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Product_id</label>

                    <select name="product_id" class="form-control">
                    <option value="" selected disabled>(:--Select Supplier--:)</option>
                      @foreach($product as $eachproduct)  
                      <option value="{{$eachproduct->id}}">{{$eachproduct->productName}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                </div>
                  <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit" required>
                  </div>

    </form>

@endsection