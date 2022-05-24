<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\WeWork;
use Illuminate\Support\Str;
Use Image;
Use File;

class WeWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WeWorks = WeWork:: orderBy('id', 'asc')->get();
        return view('backend.pages.WeWork.manage', compact('WeWorks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.pages.WeWork.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $WeWork = new WeWork();
        $WeWork->title         = $request->title;
        $WeWork->paragraph_one         = $request->paragraph_one;
        $WeWork->paragraph_two         = $request->paragraph_two;
        $WeWork->paragraph_three         = $request->paragraph_three;
        
        $WeWork->button_text  = $request->button_text;
        $WeWork->button_url  = $request->button_url;
        

       
        $WeWork->save();
        return redirect()->route('wework.manage');
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
        $WeWork = WeWork::find($id);
        if ( !is_null($WeWork)) {
            return view('backend.pages.WeWork.edit', compact('WeWork'));
            
        }
        else{

            return redirect()->route('wework.manage');

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
        
        $WeWork = WeWork::find($id);
        $WeWork->title         = $request->title;
        $WeWork->paragraph_one         = $request->paragraph_one;
        $WeWork->paragraph_two         = $request->paragraph_two;
        $WeWork->paragraph_three         = $request->paragraph_three;
        
        $WeWork->button_text  = $request->button_text;
        $WeWork->button_url  = $request->button_url;
        

        $WeWork->save();
        return redirect()->route('wework.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $WeWork = WeWork::find($id);
        if (!is_null( $WeWork ))
         {
          
            $WeWork->delete(); 
            return redirect()->route('wework.manage'); 
        }
        else{
            return redirect()->route('wework.manage');

        }
    }
}
