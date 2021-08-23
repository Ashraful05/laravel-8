@extends('admin.master')
@section('title','Update Profile')
@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile Update</h2>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-body">
            <form action="{{ route('update-user-profile') }}" method="post" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="current_password" placeholder="Current Password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="current_password" placeholder="Current Password">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Update Profile</button>

            </form>
        </div>
    </div>
@endsection

