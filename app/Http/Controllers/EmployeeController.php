<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employe.index');
    }
    public function create()
    {
        return view('admin.employe.create');
    }
    public function edit()
    {
        return view('admin.employe.edit');
    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
