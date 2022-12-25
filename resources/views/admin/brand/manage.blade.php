@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Brand Information</h4>
                    <p class="card-title-desc">{{Session::get('message')}}</p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->description}}</td>
                                <td><img src="{{asset($brand->image)}}" alt="{{$brand->name}}" height="50" width="70"/></td>
                                <td>{{$brand->status == 1 ? 'Publishes' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('brand-edit',['id' => $brand-> id])}}" class="btn btn-outline-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('brand-delete',['id' => $brand-> id])}}" class="btn btn-outline-danger" >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection




