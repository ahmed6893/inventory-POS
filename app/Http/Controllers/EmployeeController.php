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
    public function edit()
    {
        return view('admin.employe.edit');
    }
    public function save($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'experiance' => 'required',
            'employee_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'salary' => 'required|numeric',
            'vacation' => 'required|numeric',
            'status' => 'required|boolean'
        ]);

        Employee::saveNewEmployee($request);
        return back()->with('success', 'Employee created successfully!');
    }
    public function update($request, $id)
    {
    }
    public function destroy()
    {

    }
}
