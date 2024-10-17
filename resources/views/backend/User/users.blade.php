@extends('backend.layouts.master')
@section('navandsidebar')


<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">

                <h4 class="card-title">These are all <em class="text-success"> Users </em>

                </h4>

                <div>
                    <a href="{{ route('users.create') }}">
                        <button class="btn btn-success">Add Users</button>
                    </a>
                </div>
            </div>
            <div class="table-container overflow-x-auto">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Roles </th>
                            <th> University Id </th>
                            <th> Created_at </th>
                            <th> Updated_at </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tfoot style="display: table-header-group;">
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Roles </th>
                            <th> University Id</th>
                            <th> Created_at </th>
                            <th> Updated_at </th>
                            <th> Action </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="table-info">
                            <td> {{ $user->id }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $rolename)
                                <label class="badge badge-pill bg-success mx-1"> {{ $rolename }} </label>
                                @endforeach
                                @endif
                            </td>
                            <td> {{ $user->university_id }} </td>
                            <td> {{ $user->created_at }} </td>
                            <td> {{ $user->updated_at }} </td>
                            <td>
                                <div class="d-inline-block">
                                    <form action="{{ url('users/'.$user->id.'/delete') }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
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