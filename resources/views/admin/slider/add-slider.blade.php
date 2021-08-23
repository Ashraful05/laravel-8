@extends('admin.master')
@section('title','Add Slider Page')
@section('content')

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add Slider</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('save-slider') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Slider Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" >
                                <span class="text-danger">{{ $errors->has('title')?$errors->first('title'):'' }}</span>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Slider Image</label>
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                <span class="text-danger">{{ $errors->has('image')?$errors->first('image'):'' }}</span>
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


@endsection