@extends('admin.master')
@section('title','Manage Contact Page')

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

                        <div class="card-header">Admin Message</div>
                        <a href="{{ route('add-contact') }}"><button class="btn btn-primary">Add Contact</button></a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $key=>$message)
                                <tr>
                                    <th scope="row">{{ $key+=1 }}</th>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->message }}</td>
                                    @if($message->created_at == Null)
                                        <span class="text-danger">No Date Set</span>
                                    @else
                                        <td>{{ $message->created_at->diffForHumans() }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('delete-message',['id'=>$message->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
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



