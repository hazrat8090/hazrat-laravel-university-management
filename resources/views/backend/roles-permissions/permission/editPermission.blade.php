@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">

                <h4 class="card-title">Edit Permission <a class="text-info text-decoration-none fw-bold"> </a> </h4>

                <div class="mb-0">
                    <a href="{{ route('permissions.index') }}">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action="{{ url('permissions/'.$permission->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Permission Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $permission->name }}" placeholder="Enter the Faculty Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>



@endsection