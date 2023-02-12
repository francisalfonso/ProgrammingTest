<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    // Show create Form
    public function create() {
        return view('employees.create-employees');
    } 

    // Store listings
    public function store(Request $request) {
        $formFields = $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'companyID' => ['required'],
            'phone' => [Rule::unique('employees', 'phone')],
            'email' => [Rule::unique('employees', 'email')]
        ]);

        Employee::create($formFields);

        return redirect('/')->with('message', 'Employee has succesfully added!');
    }

    // Show Edit Form
    public function edit(Employee $employee) {
        return view('employees.edit-employees', ['employee' => $employee]);
    }

    // Update Listing
    public function update(Request $request, Employee $employee) {
        $formFields = $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'companyID' => ['required'],
            'phone' => 'nullable',
            'email' => 'nullable'
        ]);

        $employee->update($formFields);

        return back()->with('message', 'Employee updated successfully!');
    }

    // Delete Listing
    public function destroy(Employee $employee) {
        $employee->delete();
        return redirect('/')->with('message', 'Employee deleted successfully!');
    }
}
