<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\TeamImage;
use Illuminate\Support\Str;
Use Image;
Use File;

class TeamImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TeamImages = TeamImage:: orderBy('id', 'asc')->get();
        return view('backend.pages.TeamImage.manage', compact('TeamImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.TeamImage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $TeamImage = new TeamImage();
        $TeamImage->title         = $request->title;
 
        if ($request->image) {
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/teamimage/' .$img);
            Image::make($image)->save($location);
            $TeamImage->image = $img;
        }
        $TeamImage->save();
        return redirect()->route('teamimage.manage');
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
         $TeamImage = TeamImage::find($id);
        if ( !is_null($TeamImage)) {
            return view('backend.pages.TeamImage.edit', compact('TeamImage'));
            
        }
        else{

            return redirect()->route('teamimage.manage');

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
       $TeamImage = TeamImage::find($id);
        $TeamImage->title         = $request->title;
        
        

        if (!is_null($request->image))
         {
            if (File::exists('Backend/img/teamimage/' . $TeamImage->image)) {
               File::delete('Backend/img/teamimage/' . $TeamImage->image);
            }
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/teamimage/' .$img);
            Image::make($image)->save($location);
            $TeamImage->image = $img;
        }
        $TeamImage->save();
        return redirect()->route('teamimage.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TeamImage = TeamImage::find($id);
        if (!is_null( $TeamImage ))
         {
          if (File::exists('Backend/img/teamimage/' . $TeamImage->image)) {
               File::delete('Backend/img/teamimage/' . $TeamImage->image);
            }
            $TeamImage->delete(); 
            return redirect()->route('teamimage.manage'); 
        }
        else{
            return redirect()->route('teamimage.manage');

        }
    }
}
