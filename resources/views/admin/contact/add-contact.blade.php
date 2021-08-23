@extends('admin.master')
@section('title','Add About Page')
@section('content')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Contact</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('save-contact') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Address</label>
                        <input type="text" name="address" class="form-control" id="exampleFormControlInput1" >
                        <span class="text-danger">{{ $errors->has('address')?$errors->first('address'):'' }}</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Phone</label>
                        <input type="number" class="form-control" name="phone">
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection


