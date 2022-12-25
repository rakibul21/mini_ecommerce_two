@extends('admin.master')

@section('body')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center mb-3">All Product Information</div>
                        <p class="text-center text-color-c">{{Session::get('message')}}</p>
                        <p class="text-center text-color-c">{{Session::get('messaged')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category_name}}</td>
                                        <td>{{$product->brand_name}}</td>
                                        <td><img src="{{asset($product->image)}}" alt="" height="50" width="70"></td>
                                        <td>{{$product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{route('product.detail',['id' => $product->id ])}}" class="btn btn btn-success btn-sm">
                                                <i class="fa fa-book-open">Detail</i></a>
                                            <a href="{{route('product.update-status',['id' => $product->id ])}}" class="btn btn btn-primary btn-sm">
                                                <i class="fa fa-arrow-up">Status</i>
                                            </a>
                                            <a href="{{route('product.edit',['id' => $product->id ])}}" class="btn btn btn-success btn-sm">
                                                <i class="fa fa-edit">Edit</i>
                                            </a>
                                            <a href="{{route('product.delete',['id' => $product->id ])}}" class="btn btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this')">
                                                <i class="fa fa-trash">Delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <table class="table table-bordered table-hover">
                                <thead>

                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
