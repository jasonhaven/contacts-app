<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch contacts and sort by first name
        $contacts = Contact::orderBy('first_name')->get();
        return view('contacts/index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $new_date = date_create($request['birthday']);
        $request['birthday'] = $new_date;

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'numeric',
            'address' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'zip' => 'numeric',
            'birthday' => 'date',
            'email' => 'required|max:255',
        ]);
        $contact = Contact::create($validatedData);
   
        return redirect('/contacts')->with('success', 'Contact is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts/edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_date = date_create($request['birthday']);
        $request['birthday'] = $new_date;

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'numeric',
            'address' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'zip' => 'numeric',
            'birthday' => 'date',
            'email' => 'required|max:255',
        ]);
        Contact::whereId($id)->update($validatedData);
   
        return redirect('/contacts')->with('success', 'Contact is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact is successfully deleted');
    }

}
