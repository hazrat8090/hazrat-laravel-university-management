@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">Add a Department for <a class="text-info text-decoration-none fw-bold"> {{$faculty->university_id}}</a> University and <a class=" text-decoration-none fw-bold text-info"> {{ $faculty->name }}</a> Faculty</h4>
                <div class="mb-0">
                    <a href="">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action=" {{ route('saveDepartment', ['university_id' => $faculty->university_id, 'faculty_id' => $faculty->id]) }} " method="post">
                @csrf
                <div>
                    <input type="hidden" name="faculty_id" class="form-control" value="{{$faculty->id}}" id="faculty_id" placeholder="enter the faculty id">
                </div>
                <div>
                    <input type="hidden" name="university_id" class="form-control" value="{{$faculty->university_id}}" id="university_id" placeholder="enter the faculty id">
                </div>
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter the Department Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Department Location</label>
                    <input type="text" name="department_location" class="form-control" id="department_location" placeholder="Enter the department location">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_teachers">Manager</label>
                    <input type="text" name="manager" class="form-control" id="manager" placeholder="Enter the name of manager">
                    @error('no_teachers')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>


                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>



@endsection