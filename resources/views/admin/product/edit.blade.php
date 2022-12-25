@extends('admin.master')

@section('body')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header text-center"> Update Product</div>
                        <div class="card-body">
                            <p class="text-center">{{Session::get('message')}}</p>
                            <form action="{{route('product.update',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-3">
                                    <label for="" class="col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->name}}" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="" class="col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->category_name}}" class="form-control" name="category_name">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="" class="col-md-3">Brand Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->brand_name}}" class="form-control" name="brand_name">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="" class="col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea  class="form-control" rows="5" name="description">{{$product->description}} </textarea>
                                    </div>
                                </div>

                                <div class=" form-group row mb-3">
                                    <label for="" class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <img src="{{asset($product->image)}}" alt="" height="100" width="120">
                                        <input type="file" value="" class="form-control-file" name="image">..
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Publication Status</label>
                                    <div class="col-md-9">
                                        <label for=""><input type="radio" name="status" {{$product->status == 1 ? 'checked' : ''}} value="1">Published</label>
                                        <label for=""><input type="radio" name="status" {{$product->status == 0 ? 'checked' : ''}} value="0">Unpublished</label>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-info" value="Update Product info"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
