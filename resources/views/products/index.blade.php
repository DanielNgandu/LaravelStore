@extends('products.layout')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container align-content-center">
                <h1 class="text-center">Welcome</h1>
                <h3 class="text-center text-uppercase">Laravel Store</h3>
                <p></p>
            </div>
        </div>

        <div class="container">
            <div class="row align-baseline">
                <div class="col-9">
                    <div class="pull-left">
                        <h1>Product List</h1>
                        <h2>Hoverable Dark Table</h2>
                        <p>The .table-hover class adds a hover effect (grey background color) on table rows:</p>
                        <table class="table table-dark table-hover table-responsive d-print-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>

                                <td>1</td>
                                <td>
                                    <img
                                        src="{{url($product->logo)}}"
                                        alt="image here" class="img-thumbnail" style="height: 5em;width: 5em">
                                </td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_code}}</td>
                                <td>{{$product->details}}</td>
                                <td>
                                    <a href="edit/{{$product->id}}" class="btn-primary btn-sm">Edit</a>
                                    <a href="view/{{$product->id}}" class="btn-success btn-sm">View</a>
                                    <a href="delete/{{$product->id}}" class="btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3">
                    <div class="">
                        <a href="{{route('create.product')}}" type="button" class="btn-lg btn-primary">Add New Product</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection
