@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                @if($faculty)
                <h4 class="card-title">Edit <a class="text-info text-decoration-none fw-bold">{{ $faculty->university_id }} </a> faculty</h4>
                @else
                <p>the faculty is not exist</p>
                @endif
                <div class="mb-0">
                    <a href="">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action="" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="hidden" name="university_id" value="" class="form-control" id="university_id" placeholder="Enter the Faculty Id">
                </div>
                <div class="form-group">
                    <label for="name">Faculty Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="" placeholder="Enter the Faculty Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_teachers">No Teachers</label>
                    <input type="text" name="no_teachers" class="form-control" id="no_teachers" value="" placeholder="Enter the Number of Teachers">
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