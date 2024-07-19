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
        $divisions = Divisions::oldest()->paginate(10);

        // Render view dengan data divisions
        return view('division.index', compact('divisions'));
    }

    public function show($id)
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
            'employee' => 'array'
        ]);

        $division = Divisions::create([
            'name_division' => $request->name, // kiri nama kolom & kanan nama inputan
        ]);

        if ($request->has('employees')) {
            foreach ($request->employees as $employeeId) {
                $employee = Employees::find($employeeId);
                if ($employee) {
                    $employee->division_id = $division->id;
                    $employee->save();
                }
            }
        }
    
        return redirect()->route('division.index')->with('success', 'Divisi berhasil ditambahkan!');
    }

    public function edit($id) : View
    {
        $division = Divisions::findOrFail($id);
        $employees = Employees::all();
        return view('division.edit', compact('division', 'employees'));
    }

    public function update(Request $request, $id)
    {

        $division = Divisions::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'employee' => 'array'
        ]);

        $division->update([
            'name_division' => $request->name, // kiri nama kolom & kanan nama inputan
        ]);

        // Ambil semua employee yang terkait dengan divisi ini
        $previousEmployeeIds = $division->employees->pluck('id')->toArray();

        // Employee yang baru dipilih
        $newEmployeeIds = $request->has('employees') ? $request->employees : [];

        // Employee yang tidak dipilih lagi
        $unselectedEmployeeIds = array_diff($previousEmployeeIds, $newEmployeeIds);

        // Set division_id ke null untuk employee yang tidak dipilih lagi
        Employees::whereIn('id', $unselectedEmployeeIds)->update(['division_id' => null]);

        if ($request->has('employees')) {
            foreach ($request->employees as $employeeId) {
                $employee = Employees::find($employeeId);
                if ($employee) {
                    $employee->division_id = $division->id;
                    $employee->save();
                }
            }
        }

        return redirect()->route('division.index')->with('success', 'Divisi berhasil diubah!');
    }

    public function destroy($id)
    {
        $division = Divisions::findOrFail($id);

        $division->delete();

        return redirect()->route('division.index')->with('success', 'Divisi berhasil dihapus!');
    }
}
