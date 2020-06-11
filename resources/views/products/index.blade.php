@extends('products.layout')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1>Welcome</h1>
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
                            <tr>
                                <td>1</td>
                                <td>
                                    <img
                                        src="{{url('/uploads/T1591473883.jpeg')}}"
                                        alt="image here" class="img-thumbnail" style="height: 5em;width: 5em">
                                </td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                                <td>
                                    <a href="edit/id" class="btn-primary btn-sm">Edit</a>
                                    <a href="view/id" class="btn-success btn-sm">View</a>
                                    <a href="delete/id" class="btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3">
                    <div class="">
                        <a href="#" type="button" class="btn-lg btn-primary">Add New Product</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
