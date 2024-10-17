@extends('backend.layouts.master')
@section('navandsidebar')


<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">

                <h4 class="card-title">These are all Roles</h4>

                <div>
                    <a href="{{ route('roles.create') }}">
                        <button class="btn btn-success">Add Role</button>
                    </a>
                </div>
            </div>
            <div class="table-container overflow-x-auto">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Guard </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tfoot style="display: table-header-group;">
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Guard </th>
                            <th> Action </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($roles as $role)
                        <tr class="table-info">
                            <td> {{ $role->id }} </td>
                            <td> {{ $role->name }} </td>
                            <td> {{ $role->guard_name }} </td>
                            <td>
                                <!-- <div class="d-inline-block">
                                    <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div> -->
                                <div class="d-inline-block">
                                    <a href="{{url('roles/'.$role->id.'/giv-permissions')}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Add | Edit Role Permission</a>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{url('roles/'.$role->id.'/edit')}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{url('roles/'.$role->id.'/delete')}}" class="btn btn-sm btn-danger"><i class="fa fa-edit"></i> delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection