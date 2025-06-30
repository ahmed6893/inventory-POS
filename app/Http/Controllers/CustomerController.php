<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.index', ['customers' => Customer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'shop_name' => 'nullable|string|max:255',
            'customer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:255',
            'bank_branch' => 'nullable|string|max:255',
        ]);

        $customer = new Customer();
        $customer->saveCustomer($request);
        return back()->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'shop_name' => 'nullable|string|max:255',
            'customer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:255',
            'bank_branch' => 'nullable|string|max:255',
        ]);

        $customer->updateCustomer($request, $customer->id);
        return back()->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        Customer::deleteCustomer($customer->id);
        return back()->with('success', 'Customer deleted successfully');
    }
}
