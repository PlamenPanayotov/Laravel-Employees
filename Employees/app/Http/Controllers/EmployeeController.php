<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(15);
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|min:5|max:255',
            'adress' => 'required|min:5|max:255',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'department' => 'required|min:3|max:255',
            'position' => 'required|min:3|max:255',
            'salary' => 'required|numeric|digits_between:3,5'
        ]);
        $employee = new Employee();
        $employee->full_name = $request->input('full_name');
        $employee->adress = $request->input('adress');
        $employee->phone = $request->input('phone');
        $employee->department = $request->input('department');
        $employee->position = $request->input('position');
        $employee->salary = $request->input('salary');
        $employee->save();

        return redirect('/employees')->with('success', 'Employee added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'adress' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'position' => 'required',
            'salary' => 'required'
        ]);
        $employee = Employee::find($id);
        $employee->full_name = $request->input('full_name');
        $employee->adress = $request->input('adress');
        $employee->phone = $request->input('phone');
        $employee->department = $request->input('department');
        $employee->position = $request->input('position');
        $employee->salary = $request->input('salary');
        $employee->save();

        return redirect('/employees')->with('success', 'Employee updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee Removed');
    }
}
