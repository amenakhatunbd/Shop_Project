@extends('layouts.master')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Product  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/products/create')}}" title="Create Customer"> Create Product</a>
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
            <th>category name</th>
            <th>ProductName</th>
            <th>Purchases</th>
            <th>Sales</th>
            <th>Actions</th>
        </tr>
        <?php $i=0?>
            @foreach($products as $product)
        <tr>
            <td>{{$i+=1}}</td>
            <td>{{$product->category->category}}</td>
            <td>{{$product->productName}}</td>
            <td>{{$product->purchases}}</td>
            <td>{{$product->sales}}</td>
            <td>
                <a href="{{url('/products/'.$product->id.'/edit')}}" class="btn btn-xs btn-primary">edit</a>
                <form  action="{{url('/products/'.$product->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit"  onclick="return confirm('are you sure?')" class="btn btn-xs btn-danger" value="DELETE">delete</button>
                </form>
            </td>
        </tr>
       

   @endforeach
    </table>

@endsection