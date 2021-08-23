<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category <b></b>
            <b style="float: right;">
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('message')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-header">All Category</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No.</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created By User</th>
                                <th scope="col">Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    @if($category->created_at == Null)
                                        <span class="text-danger">No Date Set</span>
                                    @else
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('edit-category',['id'=>$category->id]) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete-category',['id'=>$category->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('save-category') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text text-danger">{{ $errors->has('category_name')?$errors->first('category_name'):'' }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- ThresPart  -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">


                        <div class="card-header">Trash List</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No.</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created By User</th>
                                <th scope="col">Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trachCategory as $key=>$category)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    @if($category->created_at == Null)
                                        <span class="text-danger">No Date Set</span>
                                    @else
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('restore-category',['id'=>$category->id]) }}" class="btn btn-info">Restore</a>
                                        <a href="{{ route('permanent-delete-category',['id'=>$category->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Permanent Delete</a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{ $trachCategory->links() }}
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
{{--        end trush--}}
    </div>
</x-app-layout>

