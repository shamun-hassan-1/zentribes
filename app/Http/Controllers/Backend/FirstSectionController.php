<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\FirstSection;
use Illuminate\Support\Str;
Use Image;
Use File;

class FirstSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $FirstSections = FirstSection:: orderBy('id', 'asc')->get();
        return view('backend.pages.FirstSection.manage', compact('FirstSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.FirstSection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $firstSection = new FirstSection();
        $firstSection->title         = $request->title;
        
        $firstSection->button_text  = $request->button_text;
        $firstSection->button_url  = $request->button_url;
        

        if ($request->image) {
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/firstsection/' .$img);
            Image::make($image)->save($location);
            $firstSection->image = $img;
        }
        $firstSection->save();
        return redirect()->route('firstsection.manage');
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
        
         $firstSection = FirstSection::find($id);
        if ( !is_null($firstSection)) {
            return view('backend.pages.FirstSection.edit', compact('firstSection'));
            
        }
        else{

            return redirect()->route('firstsection.manage');

        }
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
         $firstSection = FirstSection::find($id);
        $firstSection->title         = $request->title;
        
        $firstSection->button_text  = $request->button_text;
        $firstSection->button_url  = $request->button_url;
        

        if (!is_null($request->image))
         {
            if (File::exists('Backend/img/firstsection/' . $firstSection->image)) {
               File::delete('Backend/img/firstsection/' . $firstSection->image);
            }
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/firstsection/' .$img);
            Image::make($image)->save($location);
            $firstSection->image = $img;
        }
        $firstSection->save();
        return redirect()->route('firstsection.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $firstSection = FirstSection::find($id);
        if (!is_null( $firstSection ))
         {
          if (File::exists('Backend/img/firstsection/' . $firstSection->image)) {
               File::delete('Backend/img/firstsection/' . $firstSection->image);
            }
            $firstSection->delete(); 
            return redirect()->route('firstsection.manage'); 
        }
        else{
            return redirect()->route('firstsection.manage');

        }
    }
}
