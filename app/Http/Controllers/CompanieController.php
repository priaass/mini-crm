<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Companies; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class CompanieController extends Controller
{
    /**
     * index
     *
     * @return void
     */

    public function index() : View
    {
        //get all products
        $companies = Companies::oldest()->paginate(3);

        //render view with products
        return view('companie.index', compact('companies'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('companie.create');
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
            'name'      => 'required|string|min:2',
            'email'     => 'required|string|min:5',
            'logo'      => 'required|image|mimes:jpeg,jpg,png|max:10000',
            'website'   => 'required|string|min:5'
        ]);

        //upload image
        $image = $request->file('logo');
        $image->storeAs('public/logo', $image->hashName());

        //create product
        Companies::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'logo'=> $image->hashName(),
            'website'=> $request->website
        ]);

        //redirect to index
        return redirect()->route('companie.index')->with(['success' => 'Companie berhasil ditambahkan!']);
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
        $companies = Companies::findOrFail($id);

        //render view with product
        return view('companie.show', compact('companies'));
        
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
        $companies = Companies::findOrFail($id);

        //render view with product
        return view('companie.edit', compact('companies'));
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
            'name'      => 'required|min:2',
            'email'     => 'required|min:5',
            'logo'      => 'image|mimes:jpeg,jpg,png|max:10000',
            'website'   => 'required|min:5',
        ]);

        //get product by ID
        $companies = Companies::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('logo')) {

            // Upload new image
            $image = $request->file('logo');
            $image->storeAs('public/logo', $image->hashName());
    
            // Delete old image if exists
            Storage::delete('public/logo/' . $companies->logo);
    
            // Update company with new image
            $companies->update([
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $image->hashName(),
                'website' => $request->website,
            ]);
        } else {
            // Update company without changing image
            $companies->update([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
            ]);
        }
    
        // Redirect to index
        return redirect()->route('companie.index')->with(['success' => 'Companie berhasil diubah!']);
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
        $companies = Companies::findOrFail($id);

        //delete image
        Storage::delete('public/logo/'. $companies->logo);

        //delete product
        $companies->delete();

        //redirect to index
        return redirect()->route('companie.index')->with(['success' => 'Companie berhasil dihapus!']);
    }
}
