@extends('layouts.master')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Purchase  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/purchases/create')}}" title="Create Customer"> Create Purchase</a>
            </div>
        </div>
    </div>
</div>
   <?php //dd(  $purchases); ?>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Id</th>
            <th>Supplier Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Actions</th>
        </tr>
        <?php $i=0?>
        @foreach($purchases as $key=> $value)

        <?php //dd(  $value); ?>

        <tr>
            <td>{{ $i+=1 }}</td>
            <td>{{ $value->supplier->name}}</td>
            <td>{{ $value->product->productName ?? '' }}</td>
            <td>{{$value->quantity}}</td>
            <td>{{$value->unitPrice}}</td>
            <td>{{$value->totalprice}}</td>
            <td>
            <a href="{{url('/purchases/'.$value->id.'/edit')}}" class="btn btn-xs btn-primary">edit</a>

            <form  action="{{url('/purchases/'.$value->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit"  onclick="return confirm('are you sure?')" class="btn btn-xs btn-danger" value="DELETE">delete</button>
                    </form>
            </td>
        </tr>
    @endforeach
        
    </table>

@endsection