@extends('admin.master')
@section('title','Manage About Page')

@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('message')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-header">All About</div>
                            <a href="{{ route('add-about') }}"><button class="btn btn-primary">Go To Add About Page</button></a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No.</th>
                                <th scope="col">About Title</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Long Description</th>
                                <th scope="col">Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($homeAbout as $key=>$about)
                                <tr>
                                    <th scope="row">{{ $key+=1 }}</th>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ Str::limit($about->short_description,50) }}</td>
                                    <td>{{ Str::limit($about->long_description,100) }}</td>
                                    @if($about->created_at == Null)
                                        <span class="text-danger">No Date Set</span>
                                    @else
                                        <td>{{ $about->created_at->diffForHumans() }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('edit-about',['id'=>$about->id]) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete-about',['id'=>$about->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


