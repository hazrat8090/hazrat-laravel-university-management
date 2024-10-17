@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">Edit <a class="text-success text-decoration-none fw-bold">{{ $university->name }}</a> Page</h4>
                <div class="mb-0">
                    <a href="{{route('showUniversity')}}">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action="{{ route('updateUniversity', ['id' => $university->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" id="exampleInputName1" placeholder="Enter the Id">
                    @error('id')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <!-- <label for="exampleInputName1">Name</label> -->
                    <input type="text" name="name" class="form-control" value="{{$university->name}}" id="exampleInputName1" placeholder="Enter the Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Branch</label>
                    <input type="text" name="branch" class="form-control" value="{{$university->branch}}" id="exampleInputPassword4" placeholder="Enter the branch">
                    @error('branch')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Type</label>
                    <input type="text" name="type" class="form-control" value="{{$university->type}}" id="exampleInputName1" placeholder="Enter the type of university">
                    @error('type')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">No Faculty</label>
                    <input type="text" name="no_faculty" class="form-control" value="{{$university->no_faculty}}" id="exampleInputName1" placeholder="Enter the number of faculty">
                    @error('no_faculty')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>



                <button type="submit" class="btn btn-gradient-primary me-2">Edit</button>
            </form>
        </div>
    </div>
</div>



@endsection