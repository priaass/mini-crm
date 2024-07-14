<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AkunController extends Controller
{
    public function index()
    {
        $akun = User::oldest()->paginate(10);
        return view('akun.index', compact('akun'));
    }

    public function create(): View
    {
        return view('akun.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'in:superadmin,admin,user'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('akun.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $akun = User::findOrFail($id);

        //render view with product
        return view('akun.edit', compact('akun'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'in:superadmin,admin,user'],
            'password' => [Rules\Password::defaults()],
        ]);

        //get product by ID
        $akun = User::findOrFail($id);

            //update product without image
        $akun->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        //redirect to index
        return redirect()->route('akun.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $akun = User::findOrFail($id);

        //delete product
        $akun->delete();

        //redirect to index
        return redirect()->route('akun.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
