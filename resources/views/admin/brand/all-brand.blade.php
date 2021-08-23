@extends('admin.master')
@section('title','Manage Brand Page')

@section('content')
<div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">


                        <div class="card-header">All Brand</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No.</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $key=>$brand)
                                <tr>
                                    <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src="{{ asset($brand->brand_image) }}" height="60px;" width="50px;" alt=""></td>
                                    @if($brand->created_at == Null)
                                        <span class="text-danger">No Date Set</span>
                                    @else
                                        <td>{{ $brand->created_at->diffForHumans() }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('edit-brand',['id'=>$brand->id]) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete-brand',['id'=>$brand->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form action="{{ route('save-brand') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text text-danger">{{ $errors->has('brand_name')?$errors->first('brand_name'):'' }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text text-danger">{{ $errors->has('brand_image')?$errors->first('brand_image'):'' }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

