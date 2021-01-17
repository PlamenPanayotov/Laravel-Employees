@extends('layouts.app')

@section('content')
    <h1>Add new employee</h1>
    {!! Form::open(['action' => 'EmployeeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('full_name', 'Full name')}}
            {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Full name'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
        </div>
        <div class="form-group">
            {{Form::label('adress', 'Adress')}}
            {{Form::text('adress', '', ['class' => 'form-control', 'placeholder' => 'Adress'])}}
        </div>
        <div class="form-group">
            {{Form::label('department', 'Department')}}
            {{Form::text('department', '', ['class' => 'form-control', 'placeholder' => 'Department'])}}
        </div>
        <div class="form-group">
            {{Form::label('position', 'Position')}}
            {{Form::text('position', '', ['class' => 'form-control', 'placeholder' => 'Position'])}}
        </div>
        <div class="form-group">
            {{Form::label('salary', 'Salary')}}
            {{Form::text('salary', '', ['class' => 'form-control', 'placeholder' => 'Salary'])}}
        </div>
        
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection