<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LanguageStoreRequest;
use App\Http\Requests\LanguageUpdateRequest;
use App\Transformers\LanguageTransformer;
use App\Language;
use Auth, Cookie;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $languages = Language::all();
        return view('admin.language.index')->with([
            'languages' => $languages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'code'=>'required|max:2|unique:languages,code',
        ]);
        $language = Language::create($request->all());

        return redirect()->back()->with([
            'success' => 'Language added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $lang = Language::findOrFail($id);
        return response()->json($lang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $language = Language::where('id',$id)->firstOrFail();
        $request->validate([
            'name'=>'required',
            'code'=>'required|max:2|unique:languages,code,' . $language->id,
        ]);
        $language->fill($request->all())->save();

        return redirect()->back()->with([
            'success' => 'Language edited successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
        return redirect()->back()->with([
            'success' => 'Language deleted successfully'
        ]);
    }




    public function switchLanguage(Request $request, $code)
    {

        Cookie::forever('language', $code);

        return redirect()->back()->cookie(
            'language', $code, 10000000
        );
    }
}
