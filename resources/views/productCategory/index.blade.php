@extends('layouts.app')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Product  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/ProductCategorys/create')}}" title="Create Customer"> Create Product</a>
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
            <th>Product Category Name</th>
            <th>Actions</th>
        </tr>
        
    </table>

@endsection