@extends('admin.master')
@section('title','Edit Brand Page')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                            <form action="{{ route('update-brand',['id'=>$editBrand->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $editBrand->brand_image }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" name="brand_name" value="{{ $editBrand->brand_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text text-danger">{{ $errors->has('brand_name')?$errors->first('brand_name'):'' }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Image</label>
                                    <input type="file" name="brand_image" value="{{ $editBrand->brand_image }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <img src="{{ asset($editBrand->brand_image) }}" style="height: 50px; width: 60px;" alt="">
                                    <span class="text text-danger">{{ $errors->has('brand_image')?$errors->first('brand_image'):'' }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


