@extends('backend.layouts.master')
@section('navandsidebar')


<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">These are all the Faculties those are related to the
                    <a class="text-decoration-none text-info fw-bold">{{$universities->name}}</a> University
                </h4>
                <div>
                    <a href="{{ route('addFaculty', ['id' => $universities->id]) }}">
                        <button class=" btn btn-success">Add Faculty</button>
                    </a>

                </div>
            </div>

            <div class="table-container overflow-x-auto">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Faculty Name </th>
                            <th> No Teachers </th>
                            <th> University Id </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tfoot style="display: table-header-group;">
                        <tr>
                            <th> Id </th>
                            <th> Faculty Name </th>
                            <th> No Teachers </th>
                            <th> University Id </th>
                            <th> Action </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($faculties as $specific)
                        <tr class="table-info">
                            <td> {{ $specific->id }} </td>
                            <td> {{ $specific->name }} </td>
                            <td> {{ $specific->no_teachers}} </td>
                            <td> {{ $specific->university_id }} </td>
                            <td>
                                <div class="d-inline-block">
                                    <form action="{{route('deleteSpecificFaculty', ['university_id'=>$specific->university_id, 'id'=>$specific->id])}}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{route('editSpecificFaculty', ['university_id'=>$specific->university_id, 'id'=>$specific->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{route('addSpecificDepartment', ['university_id'=>$specific->university_id, 'id'=>$specific->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Add Department</a>
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