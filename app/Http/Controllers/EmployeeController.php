<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employe.index',['employees'=>Employee::all()]);
    }
    public function create()
    {
        return view('admin.employe.create');
    }
    public function edit($request, $id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employe.edit', compact('employee'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'experiance' => 'required',
            'employee_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'salary' => 'required|numeric',
            'vacation' => 'required',
            'status' => 'required|boolean'
        ]);

        Employee::saveNewEmployee($request);
        return back()->with('success', 'Employee created successfully!');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employe.show', compact('employee'));
    }
    public function update($request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'experiance' => 'required',
            'employee_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'salary' => 'required|numeric',
            'vacation' => 'required',
            'status' => 'required|boolean'
        ]);

        Employee::updateEmployee($request, $id);
        return back()->with('success', 'Employee updated successfully!');
    }
    public function destroy($id)
    {
        Employee::deleteEmployee($id);
        return back()->with('success', 'Employee deleted successfully!');
    }
}
