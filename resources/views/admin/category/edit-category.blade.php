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
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('update-category',['id'=>$editCategory->id]) }}" method="post">
                                @csrf
                                <div class="form-group"></div>
                                <input type="hidden" name="category_id" value="{{ $editCategory->id }}">

                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category_name" value="{{ $editCategory->category_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <label for="exampleInputEmail1">User Id</label>
                                <input type="text" name="user_id" value="{{ $editCategory->user_id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <span class="text text-danger">{{ $errors->has('category_name')?$errors->first('category_name'):'' }}</span>

                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

