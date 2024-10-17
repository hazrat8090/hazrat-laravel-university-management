@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Add University</h4> -->
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">Add University</h4>
                <div class="mb-0">
                    <a href="{{route('showUniversity')}}">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action="{{route('saveUniversity')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter the Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Branch</label>
                    <input type="text" name="branch" class="form-control" id="branch" placeholder="Enter the branch">
                    @error('branch')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Type</label>
                    <input type="text" name="type" class="form-control" id="type" placeholder="Enter the type of university">
                    @error('type')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">No Faculty</label>
                    <input type="text" name="no_faculty" class="form-control" id="no_faculty" placeholder="Enter the number of faculty">
                    @error('no_faculty')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>



                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>



@endsection