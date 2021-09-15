@extends('layouts.master')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Suppliers  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/suppliers/create')}}" title="Create Customer"> Create Suppliers</a>
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
            <th>id</th>
            <td>name</td>
            <td>email</td>
            <td>phone</td>
            <th>Actions</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($suppliers as $supplier)
        <tr>
            <td>{{$i+=1}}</td>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->email}}</td>
            <td>{{$supplier->phone}}</td>
            <td>
                   
                <a href="{{url('/suppliers/'.$supplier->id.'/edit')}}" class="btn btn-xs btn-primary">Edit</a>
                    <form  action="{{url('/suppliers/'.$supplier->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit"  onclick="return confirm('are you sure?')" class="btn btn-xs btn-danger" value="DELETE">delete</button>
                    </form>

                </td>
        </tr>

    @endforeach
       

   
    </table>

@endsection