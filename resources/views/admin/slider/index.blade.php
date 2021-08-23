@extends('admin.master')
@section('title','Manage Slider Page')

@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <h2><a href="{{ route('add-slider') }}"><button class="btn btn-sm btn-primary">Add Slider</button></a></h2>
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

                        <div class="card-header">All Slider</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No.</th>
                                <th scope="col">Slider Title</th>
                                <th scope="col">Slider Description</th>
                                <th scope="col">Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $key=>$slider)
                                <tr>
                                    <th scope="row">{{ $key+=1 }}</th>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td><img src="{{ asset($slider->image) }}" height="90px;" width="80px;" alt=""></td>
                                    @if($slider->created_at == Null)
                                        <span class="text-danger">No Date Set</span>
                                    @else
                                        <td>{{ $slider->created_at->diffForHumans() }}</td>
                                    @endif
                                    <td>
                                        <a href="" class="btn btn-info">Edit</a>
                                        <a href="" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
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

