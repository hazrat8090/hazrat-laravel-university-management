@extends('backend.layouts.master')
@section('navandsidebar')

<div class="card text-bg-info mb-3 h-100" style="max-width: 100rem;">
    <div class="card-header">Header</div>
    <div class="card-body">
        <h3>Department Details </h3>
        <p class="card-text fs-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <div class=" list-group-item bg-info">
            @foreach($showDepartment as $records)
            <ul class="fs-5">
                <li>Department Id: {{ $records->id }}</li>
                <li>Department Name: {{ $records->name }}</li>
                <li>Department Location: {{ $records->department_location }}</li>
                <li>Faculty Id: {{ $records->faculty_id }}</li>
                <li>University Id: {{ $records->university_id }}</li>
                <li>Manager : {{ $records->manager }}</li>
            </ul>
            @endforeach
        </div>
    </div>
</div>


@endsection