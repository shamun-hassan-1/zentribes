<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ChosseUs;
use Illuminate\Support\Str;
Use Image;
Use File;

class ChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ChooseUss = ChosseUs:: orderBy('id', 'asc')->get();
        return view('backend.pages.chooseus.manage', compact('ChooseUss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.pages.chooseus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chooseus = new ChosseUs();
        $chooseus->title         = $request->title;
        
        $chooseus->button_text  = $request->button_text;
        $chooseus->button_url  = $request->button_url;
        

       
        $chooseus->save();
        return redirect()->route('chooseus.manage');
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
        $chooseus = ChosseUs::find($id);
        if ( !is_null($chooseus)) {
            return view('backend.pages.chooseus.edit', compact('chooseus'));
            
        }
        else{

            return redirect()->route('chooseus.manage');

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
        $chooseus = ChosseUs::find($id);
        $chooseus->title         = $request->title;
        
        $chooseus->button_text  = $request->button_text;
        $chooseus->button_url  = $request->button_url;
        

        $chooseus->save();
        return redirect()->route('chooseus.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $chooseus = ChosseUs::find($id);
        if (!is_null( $chooseus ))
         {
          
            $chooseus->delete(); 
            return redirect()->route('chooseus.manage'); 
        }
        else{
            return redirect()->route('chooseus.manage');

        }
    }
}
