@extends('layouts.master')

@section('content')
<div class="container mt-5">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Category  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/categorys/create')}}" title="Create Customer"> Create Category</a>
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
            <th>Category Name</th>            
            <th>Actions</th>
        </tr>
        <?php $i=0?>
        @foreach ($categorys as $category)
        <tr>
            <td>{{$i+=1}}</td>
            
            <td>{{$category->category}}</td>
            <td>
                   
                <a href="{{url('/categorys/'.$category->id.'/edit')}}" class="btn btn-xs btn-primary">Edit</a>
                <form  action="{{url('/categorys/'.$category->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit"  onclick="return confirm('are you sure?')" class="btn btn-xs btn-danger" value="DELETE">Delet</button>
                    </form>

                </td>
        </tr>

    @endforeach
    </table>

@endsection