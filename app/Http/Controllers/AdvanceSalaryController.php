<?php

namespace App\Http\Controllers;

use App\Models\AdvanceSalary;
use Illuminate\Http\Request;
use App\Models\Employee;

class AdvanceSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advanceSalaries = AdvanceSalary::with('employee')->latest()->get();
        return view('admin.advance_salary.index', compact('advanceSalaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.advance_salary.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|string|max:7',
            'payment_date' => 'required|date',
            'status' => 'required|string|max:20',
            'notes' => 'nullable|string|max:255',
        ]);

        $exists= AdvanceSalary::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->exists();

        if ($exists) {
            return back()->withErrors(['error' => 'Advance salary for this employee and month already exists.']);
        }

        AdvanceSalary::create($validatedData);
        return back()->with('success', 'Advance Salary created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdvanceSalary $advanceSalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdvanceSalary $advanceSalary)
    {
        $employees = Employee::all();
        return view('admin.advance_salary.edit', compact('advanceSalary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdvanceSalary $advanceSalary)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|string|max:7', // e.g. '2025-07'
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:50',
            'status' => 'required|string|max:20',
            'notes' => 'nullable|string|max:255',
        ]);

        $exists = AdvanceSalary::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->where('id', '!=', $advanceSalary->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['error' => 'Advance salary for this employee and month already exists.']);
        }

        $advanceSalary->update($validatedData);
        return back()->with('success', 'Advance Salary updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdvanceSalary $advanceSalary)
    {
        $advanceSalary->delete();
        return back()->with('success', 'Advance Salary deleted successfully!');
    }
}
