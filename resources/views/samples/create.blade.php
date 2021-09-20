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
    
    <form action="{{url('/samples')}}" method="post" enctype="multipart/form-data">
        @csrf
  
               <div class="col-md-6">
                  <div class="form-group">
                    <label>userName</label>
                    <input type="text" name="name" class="form-control" value="" >

                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" onblur="duplicateEmail(this)" class="form-control" value="" >
                    <span id="msg" style="display:none;color:red;">This E-mail already taken.</span>
                  </div>
                  <div class="form-group">
                    <label>phone</label>
                    <input type="text" name="phone" class="form-control" value="" >
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <select name="product_id" class="form-control">
                    <option value="" selected disabled>(:--Select product--:)</option>
                      @foreach($samples as $sample)  
                      <option value="{{$sample->id}}">{{$sample->productName}}</option>
                      @endforeach
                    </select>
                  </div>
                   
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" id="submit" class="btn btn-primary btn-block" value="Submit" required>
                  </div>

    </form>
  <script>
      function duplicateEmail(element){
        var email = $(element).val();
        $.ajax({
            type: "POST",
            url: '{{url('checksample')}}',
            data: {email:email, "_token": "{{ csrf_token() }}"},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    $('#msg').show();
                    $("#submit").attr('disabled',true);
                }else{
                    $('#msg').hide();
                    $("#submit").attr('disabled',false);
                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }

  </script>

@endsection