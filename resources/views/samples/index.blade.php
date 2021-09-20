@extends('layouts.master')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sample Table </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/samples/create')}}" title="Create Customer"> Create Samples</a>
            </div>
        </div>
    </div>
</div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>Delete success</p>
        </div>
    @endif



    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>product name</th>
            <th>Actions</th>
        </tr>

        <?php $i=0?>
@foreach($samples as $sample)
        <tr>
            <td>{{$i+=1}}</td>
            <td>{{$sample->name}}</td>
            <td>{{$sample->email}}</td>
            <td>{{$sample->phone}}</td>
            <td>{{$sample->product->productName}}</td>
            <td>
            <a href="{{url('/samples/'.$sample->id.'/edit')}}" class="btn btn-xs btn-primary">Edit</a>
                <form  action="{{url('/samples/'.$sample->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit"  onclick="return confirm('are you sure?')" class="btn btn-xs btn-danger" value="DELETE">Delet</button>
                    </form>
            </td>
        </tr>

@endforeach
    </table>

   

@endsection