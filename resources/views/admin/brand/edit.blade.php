@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Brand Form</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <form action="{{route('brand-update',['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$brand->name}}" id="horizontal-firstname-input" name="name"/>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input3" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="horizontal-password-input3" name="description">{{$brand->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input4" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <img src="{{asset($brand->image)}}" alt="" height="100" width="130">
                                <input type="file" class="form-control-file" id="horizontal-password-input4" name="image"/>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input4" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label for=""><input type="radio" name="status" {{$brand->status == 1 ? 'checked' : ''}} value="1">Published</label>
                                <label for=""><input type="radio" name="status" {{$brand->status == 0 ? 'checked' : ''}} value="0">Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Brand info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


