<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\writerSection;
use Illuminate\Support\Str;
Use Image;
Use File;

class writerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writersections = writerSection:: orderBy('id', 'asc')->get();
        return view('backend.pages.WriterSection.manage', compact('writersections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.pages.WriterSection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $writersection = new writerSection();
        $writersection->title         = $request->title;
        
        $writersection->button_text  = $request->button_text;
        $writersection->button_url  = $request->button_url;
        

       
        $writersection->save();
        return redirect()->route('writersection.manage');
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
        $writerSection = writerSection::find($id);
        if ( !is_null($writerSection)) {
            return view('backend.pages.WriterSection.edit', compact('writerSection'));
            
        }
        else{

            return redirect()->route('writersection.manage');

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
       $writerSection = writerSection::find($id);
        $writerSection->title         = $request->title;
        
        $writerSection->button_text  = $request->button_text;
        $writerSection->button_url  = $request->button_url;
        

        $writerSection->save();
        return redirect()->route('writersection.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $writerSection = writerSection::find($id);
        if (!is_null( $writerSection ))
         {
          
            $writerSection->delete(); 
            return redirect()->route('writersection.manage'); 
        }
        else{
            return redirect()->route('writersection.manage');

        }
    }
}
