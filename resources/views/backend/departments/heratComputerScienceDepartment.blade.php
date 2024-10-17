@extends('backend.layouts.master')
@section('navandsidebar')


<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">All Departments Related to the Computer Science faculty of Herat University </h4>
                <div>
                    <a href="">
                        <button class="btn btn-success">Add Department</button>
                    </a>
                </div>
            </div>

            <div class="table-container overflow-x-auto">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Department Name </th>
                            <th> Department Location </th>
                            <th> Faculty Id </th>
                            <th> University Id </th>
                            <th> Manager </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tfoot style="display: table-header-group;">
                        <tr>
                            <th> Id </th>
                            <th> Department Name </th>
                            <th> Department Location </th>
                            <th> Faculty Id </th>
                            <th> University Id </th>
                            <th> Manager </th>
                            <th> Action </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($CSfaculty as $department)
                        <tr class="table-info">
                            <td> {{ $department->id }} </td>
                            <td> {{ $department->name }} </td>
                            <td> {{ $department->department_location }} </td>
                            <td> {{ $department->faculty_id }} </td>
                            <td> {{ $department->university_id }} </td>
                            <td> {{ $department->manager }} </td>
                            <td>
                                <div class="d-inline-block">
                                    <form action=" " method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                                <div class="d-inline-block">
                                    <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Add Department</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


@endsection