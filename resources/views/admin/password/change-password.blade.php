@extends('admin.master')
@section('title','Change Password')
@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Password Change</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('update-password') }}" method="post" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlPassword3">Current Password</label>
                    <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password">

                    @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">New Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">

                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">

                    @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-block btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
