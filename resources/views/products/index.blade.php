@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="pull-right">
                <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-border">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product -> id }}</td>
            <td>{{ $product -> name }}</td>
            <td>{{ $product -> detail }}</td>
            <td>
                <form action="{{ route('products.destroy',  $product->id) }}" method="POST">
                    <a href="{{ route('products.show',$product->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    
        @endforeach
    </table>
    {{ $products->links() }}


@endsection