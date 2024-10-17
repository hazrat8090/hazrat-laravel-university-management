@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">Edit Department</h4>
                <div class="mb-0">
                    <a href="{{ route('department.index') }}">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action="{{route('department.update', ['department'=>$department->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">Faculty Id</label>
                    <!-- <input type="text" name="id" class="form-control" id="id" placeholder="Enter the Faculty Id"> -->
                    <select name="faculty_id" id="faculty_id" value="{{ $department->faculty_id }}" class="form-control">
                        @foreach($departments as $id => $name)
                        <option value="{{ $id }}"> {{ $department->faculty_id }} </option>
                        @endforeach
                    </select>
                    @error('id')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $department->name }}" id="name" placeholder="Enter the Faculty Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Department Location</label>
                    <input type="text" name="department_location" class="form-control" value="{{ $department->department_location }}" id="location" placeholder="Enter the Faculty Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_teachers">Manager</label>
                    <input type="text" name="manager" class="form-control" value="{{ $department->manager }}" id="manager" placeholder="Enter the Number of Teachers">
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