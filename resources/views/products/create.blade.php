@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Products</h2>
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
    
    <form action="{{url('/products')}}" method="post" enctype="multipart/form-data">
        @csrf
  
               <div class="col-md-12">
                  <div class="form-group">
                    <label>Product Category</label>
                    <select name="category_id" class="form-control" value="">
                      @foreach($products as $product)  
                      <option value=""></option>     
                      <option value="{{$product->category_id}}">{{$product->category_id}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="productName" class="form-control" value="" >
                  </div>
                  <div class="form-group">
                    <label>Purchases</label>
                    <input type="text" name="purchases" class="form-control" value="" >
                  </div>
                  <div class="form-group">
                    <label>Sales</label>
                    <input type="text" name="sales" class="form-control" value="" >
                  </div>
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit" required>
                </div>

    </form>


@endsection