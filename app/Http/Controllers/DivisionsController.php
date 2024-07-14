<?php

namespace App\Http\Controllers;

use App\Models\Divisions;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DivisionsController extends Controller
{
    public function index() : View
    {
        // Dapatkan semua divisions dengan eager loading relasi 'employees'
        $divisions = Divisions::with('member')->oldest()->paginate(10);

        // Render view dengan data divisions
        return view('division.index', compact('divisions'));
    }

    public function show($id) : View
    {
        $division = Divisions::with('employees')->findOrFail($id);
        return view('division.show', compact('division'));
    }

    public function create() : View
    {
        $employees = Employees::all();
        return view('division.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'member_id' => 'required|exists:employees,id' // nama inputan
        ]);

        Divisions::create([
            'name_division'=> $request->name,
            'member_id'=> $request->member_id // disebelah kiri untuk nama kolom dan kanan untuk nama inputan
        ]);

        return redirect()->route('division.index')->with('success', 'Division created successfully.');
    }

    public function edit($id) : View
    {
        $division = Divisions::findOrFail($id);
        $employees = Employees::all();
        return view('division.edit', compact('division', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'member_id' => 'required|exists:employees,id',
        ]);

        $division = Divisions::findOrFail($id);
         ///update product without image
        $division->update([
            'name_division'=> $request->name,
            'member_id'=> $request->member_id
        ]);

        return redirect()->route('division.index')->with('success', 'Division updated successfully.');
    }

    public function destroy($id)
    {
        $division = Divisions::findOrFail($id);
        $division->delete();

        return redirect()->route('division.index')->with('success', 'Division deleted successfully.');
    }
}
