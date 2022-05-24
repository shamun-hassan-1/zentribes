<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\blog;
use Illuminate\Support\Str;
Use Image;
Use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $navs = blog:: orderBy('id', 'asc')->get();
        return view('backend.pages.navmenu.manage', compact('navs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.navmenu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nav = new blog();
        $nav->nav_text         = $request->nav_text;
        $nav->nav_url          = $request->nav_url;
        
        

       
        $nav->save();
        return redirect()->route('navmenu.manage');
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
        $nav = blog::find($id);
        if ( !is_null($nav)) {
            return view('backend.pages.navmenu.edit', compact('nav'));
            
        }
        else{

            return redirect()->route('navmenu.manage');

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
        $nav = blog::find($id);
        $nav->nav_text         = $request->nav_text;
        $nav->nav_url     = $request->nav_url;
        
        

        $nav->save();
        return redirect()->route('navmenu.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $nav = blog::find($id);
        if (!is_null( $nav ))
         {
          
            $nav->delete(); 
            return redirect()->route('navmenu.manage'); 
        }
        else{
            return redirect()->route('navmenu.manage');

        }
    }
}
