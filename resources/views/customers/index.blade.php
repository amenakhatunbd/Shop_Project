@extends('layouts.master')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer Table </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/customers/create')}}" title="Create Customer"> Create Customer</a>
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

        @foreach ($customers as $customer)
        <tr>
            <td>{{$i+=1}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->phone}}</td>
            <td>                   
                <a href="{{url('/customers/'.$customer->id.'/edit')}}" class="btn btn-xs btn-primary">Edit</a>
                <form  action="{{url('/customers/'.$customer->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit"  onclick="return confirm('are you sure?')" class="btn btn-xs btn-danger" value="DELETE">Delet</button>
                    </form>
                </td>
        </tr>

    @endforeach
    </table>

    {!! $customers->links() !!}

@endsection