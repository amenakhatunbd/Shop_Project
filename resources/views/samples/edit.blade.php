@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New sample</h2>
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
    
    <form action="{{url('/samples_update/'.$samples->id)}}" method="post" enctype="multipart/form-data">
        @csrf
  
               <div class="col-md-6">
                  <div class="form-group">
                    <label>userName</label>
                    <input type="text" name="name" class="form-control" value="{{$samples->name}}" >

                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$samples->email}}" >
                    <span id="msg" style="display:none;color:red;">This E-mail already taken.</span>
                  </div>
                  <div class="form-group">
                    <label>phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$samples->phone}}" >
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <select name="product_id" class="form-control">
                    <option value="" selected disabled>(:--Select product--:)</option>
                      @foreach($products as $product)  
                      <option value="{{$product->id}}" @if($product->id == $samples->product_id) selected  @endif>{{$product->productName}}</option>
                      @endforeach
                    </select>
                  </div>
                   
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" id="submit" class="btn btn-primary btn-block" value="Submit" required>
                  </div>

    </form>
  

@endsection