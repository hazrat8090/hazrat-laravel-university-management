@extends('backend.layouts.master')
@section('navandsidebar')

<!-- <h1>Add University </h1> -->
<div class="col-12 grid-margin stretch-card mb-1">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">

                <h4 class="card-title">These Roles are Related to : <a class="text-info text-decoration-none fw-bold">{{$role->name}} </a> </h4>

                <div class="mb-0">
                    <a href="{{ route('roles.index') }}">
                        <button class="btn btn-success">Back</button>
                    </a>
                </div>
            </div>
            <form class="forms-sample" action="{{ url('roles/'.$role->id.'/giv-permissions') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    @error('permission')
                    <span class="text-danger"> {{message}} </span>
                    @enderror
                    <label for="name">Permission</label>
                    <div class="row">
                        @foreach($permissions as $permission)
                        <div class="col-md-3">
                            <label>
                                <input type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />
                                {{ $permission->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @error('name')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
            </form>
        </div>
    </div>
</div>



@endsection