<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use App\Models\AdvanceSalary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::with('employee')->get();
        return view('admin.salary.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.salary.create', compact('employees'));
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
            'payment_method' => 'required|string|max:50',
            'status' => 'required|boolean',
            'notes' => 'nullable|string|max:255',
        ]);

        $advance = AdvanceSalary::where('employee_id', $validatedData['employee_id'])
            ->where('month', $validatedData['month'])
            ->sum('amount');

            $net_salary = $validatedData['amount'] - $advance;
        $validatedData['net_salary'] = $net_salary;

        Salary::create($validatedData);
        if ($advance > 0) {
            $msg = 'Salary created successfully! (Advance adjusted)';
        } else {
            $msg = 'Salary created successfully!';
        }
        return back()->with('success', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
    $employees = Employee::all();
    return view('admin.salary.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|string|max:7',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:50',
            'status' => 'required|boolean',
            'notes' => 'nullable|string|max:255',
        ]);

        $salary->update($validatedData);
        return back()->with('success', 'Salary updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {

        $salary = Salary::findOrFail($salary->id);
        $salary->delete();
        return back()->with('success', 'Salary deleted successfully!');
    }
}
