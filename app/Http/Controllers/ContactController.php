<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Config;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts= Contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->f_name = $request->f_name;
        $contact->l_name = $request->l_name;
        $contact->phone = $request->phone;
        $contact->save();
        return redirect()->route('contacts.index')->with([
            'success'=>'created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::where('id',$id)->firstOrFail();
        return response()->json($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $contact =  Contact::where('id',$id)->firstOrFail();
        $contact->f_name = $request->f_name;
        $contact->l_name = $request->l_name;
        $contact->phone = $request->phone;
        $contact->save();
        return redirect()->route('contacts.index')->with([
            'success'=>'updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $contact =  Contact::where('id',$id)->firstOrFail();
        $contact->delete();
    }

    public function switchLanguage(Request $request, $code)
    {


        Cookie::forever('language', $code);

        return redirect()->back()->cookie(
            'language', $code, 10000000
        );
    }
}
