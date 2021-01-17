@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Employees') }}
  </h2>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Adress</th>
      <th scope="col">Phone</th>
      <th scope="col">Department</th>
      <th scope="col">Position</th>
      <th scope="col">Salary</th>

      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    @if ($employees)
      @foreach ($employees as $employee)                
        <tr>
          <td>{{$employee->full_name}}</td>
          <td>{{$employee->adress}}</td>
          <td>{{$employee->phone}}</td>
          <td>{{$employee->department}}</td>
          <td>{{$employee->position}}</td>
          <td>{{$employee->salary}}</td>
          <td><a href="/employees/{{$employee->id}}" class="btn btn-secondary">View</a></td>
          </tr>       
      @endforeach                 
    @endif
  </tbody>
</table>
{{$employees->links()}}    
</div>
@endsection