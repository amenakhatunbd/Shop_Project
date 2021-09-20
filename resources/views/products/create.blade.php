@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <select name="category_id" class="form-control">
                    <option value="" selected disabled>(:--Select product--:)</option>
                      @foreach($categorys as $eachCategory)  
                      <option value="{{$eachCategory->id}}">{{$eachCategory->category}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="productName" onblur="duplicateProduct(this)" class="form-control" value="" >
                    <span id="pn" style="color:red;display:none">already has taken</span>
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
                    <input type="submit" id="submit" class="btn btn-primary btn-block" value="Submit" required>
                </div>

    </form>
<script>
  function duplicateProduct(element){
        var productName = $(element).val();
        $.ajax({
            type: "POST",
            url: '{{url('checkProduct')}}',
            data: {productName:productName, "_token": "{{ csrf_token() }}"},
            dataType: "json",
            success: function(res) {
               
              //  console.log(res);
                if(res.exists){
                   $('#pn').show();
                   $('#submit').attr('disabled',true);
                }else{
                  $('#pn').hide();
                  $('#submit').attr('disabled',false)

                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }
</script>

@endsection