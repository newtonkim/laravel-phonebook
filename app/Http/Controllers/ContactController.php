<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $contacts=\App\Contact::all();
        return view('index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact= new \App\Contact;
        $contact->name=$request->get('name');
        $contact->number=$request->get('number');
        $contact->email=$request->get('email');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $contact->date = strtotime($format);
        
        $contact->save();
        
        return redirect('contacts')->with('success', 'Information has been added');
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
         $contact = \App\Contact::find($id);
        return view('edit',compact('contact','id'));
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
        $contact= \App\Contact::find($id);
        $contact->name=$request->get('name');
        $contact->number=$request->get('number');
        $contact->email=$request->get('email');
        $contact->save();
        return redirect('contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = \App\Contact::find($id);
        $contact->delete();
        return redirect('contacts')->with('success','Information has been  deleted');
    }
}
