@extends('admin.master')

@section('body')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">Product Details Information</div>
                        <div class="card-body">
                            <p class="text-center">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">

                                <tr>
                                    <th>Product Id</th>
                                    <td>{{$product->id}}</td>
                                </tr>

                                <tr>
                                    <th>Product Name</th>
                                    <td>{{$product->name}}</td>
                                </tr>

                                <tr>
                                    <th>Category name</th>
                                    <td>{{$product->category_name}}</td>
                                </tr>

                                <tr>
                                    <th>Brand name</th>
                                    <td>{{$product->brand_name}}</td>
                                </tr>

                                <tr>
                                    <th>Product Description</th>
                                    <td>{{$product->description}}</td>
                                </tr>

                                <tr>
                                    <th>Image</th>
                                    <td><img src="{{asset($product->image)}}" alt="" height="100" width="120"></td>
                                </tr>

                                <tr>
                                    <th>Publication Status</th>
                                    <td>{{$product->status == 1 ? 'publishes' : 'Unpublished'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
