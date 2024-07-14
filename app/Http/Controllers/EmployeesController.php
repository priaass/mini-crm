<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Employees; 

use App\Models\Companies; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $employees = Employees::oldest()->paginate(10);

        //render view with products
        return view('employee.index', compact('employees'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $companies = Companies::all();
        return view('employee.create', compact('companies'));

    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'first_name'    => 'required|string|min:2',
            'last_name'     => 'required|string|min:2',
            'company'       => 'required|exists:companies,id',
            'email'         => 'required|string|min:5',
            'phone'         => 'required|string|regex:/^[0-9]{9,20}$/'
        ]);


        //create product
        Employees::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'company_id'=> $request->company,
            'email'=> $request->email,
            'phone'=> $request->phone
        ]);

        //redirect to index
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $employees = Employees::findOrFail($id);

        //render view with product
        return view('employee.show', compact('employees'));
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $employees = Employees::findOrFail($id);
        $companies = Companies::all(); // wajib untuk mengambil data dari tabel lain
        //render view with product
        return view('employee.edit', compact('employees', 'companies'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'first_name'    => 'required|string|min:2',
            'last_name'     => 'required|string|min:2',
            'company'       => 'required|exists:companies,id',
            'email'         => 'required|string|min:5',
            'phone'         => 'required|string|regex:/^[0-9]{9,20}$/'
        ]);

        //get product by ID
        $employees = Employees::findOrFail($id);

        ///update product without image
            $employees->update([
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                'company'=> $request->company,
                'email'=> $request->email,
                'phone'=> $request->phone
            ]);
        

        //redirect to index
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $employees = Employees::findOrFail($id);

        //delete product
        $employees->delete();

        //redirect to index
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    
}