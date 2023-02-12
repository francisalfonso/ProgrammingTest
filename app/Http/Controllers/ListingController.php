<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;

class ListingController extends Controller
{
    // Show all Listings
    public function index () {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }

    // Show single listing
    public function show (Listing $listing, Employee $employee) {
        return view('listings.show', [
            'listing' => $listing,
            'employee' => $employee,
            'employees' => Employee::all()
        ]);
    }

    // Show create form EMPLOYEES and COMPANY
    public function create() {
        return view('listings.create');
        return view('employees.employeecreate');
    }

    // Store listings
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('listings', 'name')],
            'website' => 'required',
            'email' => ['required', 'email'],
        ]);

        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'dimensions:min_width=100,min_height=100']);
        }

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing
    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'name' => ['required'],
            'website' => 'required',
            'email' => ['required', 'email'],
        ]);

        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'dimensions:min_width=100,min_height=100']);
        }

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}
