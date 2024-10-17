@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">

                <h4 class="card-title">Add User <a class="text-info text-decoration-none fw-bold"> </a> </h4>

                <div class="mb-0">
                    <a href="{{ route('users.index') }}">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action=" {{ route('users.store') }} " method="post">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter the Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">User Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter the Email">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">User Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter the password">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">User Role</label>
                    <select class="form-control" name="roles[]" multiple>
                        <option value=""> Select Roles </option>
                        @foreach($roles as $role)
                        <option value="{{ $role }}"> {{ $role }} </option>
                        @endforeach
                    </select>
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