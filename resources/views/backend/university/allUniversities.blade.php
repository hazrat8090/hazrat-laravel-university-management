@extends('backend.layouts.master')
@section('navandsidebar')


<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4 class="card-title">All Universities</h4>
                <div>
                    <a href="{{route('addUniversity')}}">
                        <button class="btn btn-success">Add University</button>
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
                        @foreach($universities as $record)
                        <tr class="table-info">
                            <td> {{ $record->id }} </td>
                            <td> {{ $record->name }} </td>
                            <td> {{ $record->branch }} </td>
                            <td> {{ $record->type }} </td>
                            <td> {{ $record->no_faculty }} </td>
                            <td>
                                <div class="d-inline-block">
                                    <form action="{{route('deleteUniversity', ['id'=>$record->id])}}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ route('editUniversity', ['id' => $record->id] )}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ route('addFaculty', ['id' => $record->id] )}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Add Faculty</a>
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