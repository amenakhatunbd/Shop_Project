@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer </h2>
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
    
    <form action="{{url('/customers/'.$customer->id)}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
        @csrf
  
               <div class="col-md-6">
                  <div class="form-group">
                    <label>userName</label>
                    <input type="text" name="name" class="form-control" value="{{$customer->name}}" >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$customer->email}}" >
                  </div>
                  <div class="form-group">
                    <label>phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$customer->phone}}" >
                  </div>
                   
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit" required>
                  </div>

    </form>

@endsection