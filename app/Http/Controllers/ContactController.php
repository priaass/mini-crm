<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
// use Illuminate\Contracts\View\View;
use App\Models\Contact; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ContactController extends Controller
{
        /**
     * index
     *
     * @return void
     */

    public function index(): View
    {
        $contact = Contact::all();
        $contact = Contact::oldest()->get();
        return view('contact.admin', compact('contact'));
    }
    /**
    * create
    *
    * @return View
    */
    public function create(): View
    {
        return view('contact.user');
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
            'subject'      => 'required|string|min:5',
            'desc'      => 'required|string'
        ]);

        //create product
        Contact::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'desc'=> $request->desc
        ]);

        //redirect to index
        return redirect()->route('contact.create')->with(['success' => 'Message berhasil dikirim!']);
    }
    
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->route('contact.admin')->with(['success' => 'Message berhasil dihapus!']);

    }
}
