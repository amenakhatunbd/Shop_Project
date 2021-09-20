@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Category</h2>
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
    
    <form action="{{url('/categorys')}}" method="post" enctype="multipart/form-data">
        @csrf
  
               <div class="col-md-6">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category" id="category" onblur="duplicateCategoty(this)" class="form-control" value="" >
                    <span id="msg" style="display:none;color:red;">This Category already taken.</span>

                </div>
                  
                <div class="form-group">
                    <label></label>
                    <input type="submit" id="submit" class="btn btn-primary btn-block" value="Submit" required>
                  </div>

    </form>


    <script>
        function duplicateCategoty(element){          
          var category = $(element).val();
          $.ajax({
              type: "POST",
              url: '{{url('category')}}',
              data: {category:category, "_token": "{{ csrf_token() }}"},
              dataType: "json",
              success: function(res) {
                  if(res.exists){
                    $('#msg').show();
                     $('#submit').attr('disabled',true);
                  }else{
                      $('#msg').hide();
                      $('#submit').attr('disabled',false);
                  }
              },
              error: function (jqXHR, exception) {

              }
          });
        }

</script>

@endsection