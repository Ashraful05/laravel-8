@extends('admin.master')
@section('title','Edit About Page')
@section('content')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit About</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update-about') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="edit_about" value="{{ $editAbout->id }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">About Title</label>
                        <input type="text" name="title" value="{{ $editAbout->title }}" class="form-control" id="exampleFormControlInput1" >
                        <span class="text-danger">{{ $errors->has('title')?$errors->first('title'):'' }}</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short Description</label>
                        <textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3">{{ $editAbout->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Long Description</label>
                        <textarea class="form-control" name="long_description" id="exampleFormControlTextarea1" rows="3">{{ $editAbout->long_description }}</textarea>
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection

