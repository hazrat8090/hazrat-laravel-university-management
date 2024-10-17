@extends('backend.layouts.master')
@section('navandsidebar')

<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">
                    <span class="text-success fw-bold"> {{ $mazar->name }} </span>
                </h4>
                <div>
                    <a href="">
                        <button class="btn btn-success">Add Faculty</button>
                    </a>
                </div>
            </div>
            <div class="table-container overflow-x-auto">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> University Name </th>
                            <th> Branch </th>
                            <th> Type </th>
                            <th> No Faculty </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tfoot style="display: table-header-group;">
                        <tr>
                            <th> Id </th>
                            <th> University Name </th>
                            <th> Branch </th>
                            <th> Type </th>
                            <th> No Faculty </th>
                            <th> Action </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr class="table-info">
                            <td> {{ $mazar->id }} </td>
                            <td> {{ $mazar->name }} </td>
                            <td> {{ $mazar->branch }} </td>
                            <td> {{ $mazar->type }} </td>
                            <td> {{ $mazar->no_faculty }} </td>
                            <td>
                                <div class="d-inline-block">
                                    <form action="{{route('deleteUniversity', ['id'=>$mazar->id])}}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ route('editUniversity', ['id' => $mazar->id] )}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ route('addFaculty', ['id' => $mazar->id] )}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Add Faculty</a>
                                </div>

                                <div class="d-inline-block">
                                    <a href="{{ route('facultyOfMazarUniversity', ['id' => $mazar->id] )}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> View Faculties</a>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection