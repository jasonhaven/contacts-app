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

        $new_phone = formatPhone($request['phone']);
        $request['phone'] = $new_phone;

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'zip' => 'max:255',
            'birthday' => 'date',
            'email' => 'required|max:255',
        ]);
        $contact = Contact::create($validatedData);
   
        return redirect('/contacts')->with('success', 'Contact was saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts/view', compact('contact'));
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

        $new_phone = formatPhone($request['phone']);
        $request['phone'] = $new_phone;

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'zip' => 'max:255',
            'birthday' => 'date',
            'email' => 'required|max:255',
        ]);
        Contact::whereId($id)->update($validatedData);
   
        return redirect('/contacts')->with('success', 'Contact was successfully updated!');
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

        return redirect('/contacts')->with('success', 'Contact was successfully deleted!');
    }    

}

function formatPhone($phoneNumber) 
{
    $phoneNumber = preg_replace("/[^\d]/","",$phoneNumber);
    if(strlen($phoneNumber) == 10) {
        $phoneNumber = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1)-$2-$3", $phoneNumber);
    }        
    return $phoneNumber;       
}