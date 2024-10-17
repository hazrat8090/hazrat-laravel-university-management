@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">

                <h4 class="card-title">Edit User <a class="text-info text-decoration-none fw-bold"> </a> </h4>

                <div class="mb-0">
                    <a href="{{ url('users') }}">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action=" {{ url('users/'.$user->id) }} " method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" placeholder="Enter the Name">
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">User Email</label>
                    <input type="email" name="email" class="form-control" id="email" readonly value="{{ $user->email }}" placeholder="Enter the Email">
                    @error('email')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">User Password</label>
                    <input type="password" name="password" class="form-control" value="" id="password" readonly placeholder="Enter the password">
                    @error('password')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">User Role</label>
                    <select class="form-control" name="roles[]" multiple>
                        <option value=""> Select Roles </option>
                        @foreach($roles as $role)
                        <option value="{{ $role }}" {{ in_array($role, $userRoles) ? "selected" : "" }}>
                            {{ $role }}
                        </option>
                        @endforeach
                    </select>
                    @error('roles')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="university_id">University Id</label>
                    <select class="form-control" name="university_id">
                        <option value="">Select University Id</option>
                        @foreach($universities as $id)
                        <option value="{{ $id }}" {{ in_array($id, $userUniversityId) ? "selected" : "" }}>
                            {{ $id }}
                        </option>
                        @endforeach
                    </select>
                    @error('university_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>



@endsection