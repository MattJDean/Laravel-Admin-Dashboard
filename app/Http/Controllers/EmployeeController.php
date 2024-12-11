<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch employees with pagination
        $employees = Employee::with('company')->paginate(10);

        // Return the index view with employees
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch companies for the dropdown
        $companies = Company::all();

        // Return the create view
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|regex:/^[\+0-9\-\(\)\s]+$/|min:10|max:20',
            'company_id' => 'required|exists:companies,id',
        ]);

        // Store the employee
        Employee::create($validated);

        // Redirect with success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // Optional: Implement if a detailed employee view is needed
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // Fetch companies for the dropdown
        $companies = Company::all();

        // Return the edit view with the employee and companies
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|regex:/^[\+0-9\-\(\)\s]+$/|min:10|max:20',
            'company_id' => 'required|exists:companies,id',
        ]);

        // Update the employee
        $employee->update($validated);

        // Redirect with success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // Delete the employee
        $employee->delete();

        // Redirect with success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
