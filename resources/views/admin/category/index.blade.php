@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Category Form</h4>
                    <p class="text-center text-success">{{Session::get('massage')}}</p>
                    <form action="{{route('create-category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-firstname-input" name="name"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3" >Category Description</label>
                            <div class="col-md-9">
                                <textarea name="description" id="description" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input4" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="horizontal-password-input4" name="image"/>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input4" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label for=""><input type="radio" name="status" value="1" checked>Published</label>
                                <label for=""><input type="radio" name="status" value="0">Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
