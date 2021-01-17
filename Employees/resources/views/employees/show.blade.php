@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $employee->full_name }}
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Adress</th>
                <th scope="col">Phone</th>
                <th scope="col">Department</th>
                <th scope="col">Position</th>
                <th scope="col">Salary</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->adress }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->department }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->salary }}</td>
                <td>{{$employee->created_at}}</td>
                <td>{{$employee->updated_at}}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary">Edit</a>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Delete
      </button>
    

@endsection
@include('components.modal')
