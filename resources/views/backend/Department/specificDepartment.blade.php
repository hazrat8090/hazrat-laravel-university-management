@extends('backend.layouts.master')
@section('navandsidebar')


<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">

                <h4 class="card-title">These are all Departments those are related to the University by ID
                    <a class="text-decoration-none text-success fw-bold"> {{ $dept->first()->university_id }} </a>
                    and Faculty by ID <a class="text-decoration-none text-success fw-bold"> {{ $dept->first()->faculty_id }}. </a>
                </h4>

                <div>
                    <a href="{{route('addSpecificDepartment', ['university_id'=>$dept->first()->university_id, 'id'=>$dept->first()->id])}}">
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
                        @foreach($dept as $specific)
                        <tr class="table-info">
                            <td> {{ $specific->id }} </td>
                            <td> {{ $specific->name }} </td>
                            <td> {{ $specific->department_location }} </td>
                            <td> {{ $specific->faculty_id }} </td>
                            <td> {{ $specific->university_id }} </td>
                            <td> {{ $specific->manager }} </td>
                            <td>
                                <div class="d-inline-block">
                                    <form action="{{route('deleteSpecificDepartment', ['university_id'=>$specific->university_id, 'faculty_id'=>$specific->faculty_id])}}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{route('editSpecificDepartment', ['university_id'=>$specific->university_id, 'faculty_id'=>$specific->faculty_id, 'id'=>$specific->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{route('viewOneDepartment', ['university_id'=>$specific->university_id,
                                    'faculty_id'=>$specific->faculty_id,
                                    'id'=>$specific->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> View Department</a>
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