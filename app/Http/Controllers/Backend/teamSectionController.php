<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\teamSection;
use Illuminate\Support\Str;
Use Image;
Use File;

class teamSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamsections = teamSection:: orderBy('id', 'asc')->get();
        return view('backend.pages.TeamSection.manage', compact('teamsections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.TeamSection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teamSection = new teamSection();
        $teamSection->title         = $request->title;
        $teamSection->paragraph     = $request->paragraph;
        $teamSection->button_text  = $request->button_text;
        $teamSection->button_url  = $request->button_url;
        

       
        $teamSection->save();
        return redirect()->route('teamsection.manage');
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
         $teamSection = teamSection::find($id);
        if ( !is_null($teamSection)) {
            return view('backend.pages.TeamSection.edit', compact('teamSection'));
            
        }
        else{

            return redirect()->route('teamsection.manage');

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
        
        $teamSection = teamSection::find($id);
        $teamSection->title         = $request->title;
        $teamSection->paragraph     = $request->paragraph;
        $teamSection->button_text  = $request->button_text;
        $teamSection->button_url  = $request->button_url;
        

        $teamSection->save();
        return redirect()->route('teamsection.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamSection = teamSection::find($id);
        if (!is_null( $teamSection ))
         {
          
            $teamSection->delete(); 
            return redirect()->route('teamsection.manage'); 
        }
        else{
            return redirect()->route('teamsection.manage');

        }
    }
}
